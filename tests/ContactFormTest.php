<?php
// tests/ContactFormTest.php
// QuickPOS Automated Test Suite — Epic 7: Testing Automation

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class ContactFormTest extends TestCase
{
    // ─────────────────────────────────────────────────────
    // Helper: replicates exact validation from contact.php
    // ─────────────────────────────────────────────────────
    private function validateForm(array $data): array
    {
        $name    = htmlspecialchars(trim($data['name']    ?? ''));
        $email   = htmlspecialchars(trim($data['email']   ?? ''));
        $subject = htmlspecialchars(trim($data['subject'] ?? ''));
        $message = htmlspecialchars(trim($data['message'] ?? ''));

        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            return ['success' => false, 'error' => 'Please fill in all required fields.'];
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'error' => 'Please provide a valid email address.'];
        }

        return [
            'success' => true,
            'message' => "Thank you, $name! Your message has been sent successfully."
        ];
    }

    // ─────────────────────────────────────────────────────
    // POS-19: All empty fields should fail
    // ─────────────────────────────────────────────────────
    public function testAllEmptyFieldsFail(): void
    {
        $result = $this->validateForm([
            'name' => '', 'email' => '',
            'subject' => '', 'message' => '',
        ]);

        $this->assertFalse($result['success'], "[POS-19] Empty form must fail");
        $this->assertStringContainsString(
            'Please fill in all required fields',
            $result['error'],
            "[POS-19] Must show required fields error"
        );
    }

    // ─────────────────────────────────────────────────────
    // POS-20: Missing subject field should fail
    // ─────────────────────────────────────────────────────
    public function testMissingSubjectFails(): void
    {
        $result = $this->validateForm([
            'name'    => 'Ahmad Ali',
            'email'   => 'ahmad@example.com',
            'subject' => '',
            'message' => 'Hello QuickPOS!',
        ]);

        $this->assertFalse($result['success'], "[POS-20] Missing subject must fail");
    }

    // ─────────────────────────────────────────────────────
    // POS-21: Invalid email formats — data-driven
    // ─────────────────────────────────────────────────────
    public function testInvalidEmailFails(): void
    {
        $invalidEmails = [
            'notanemail',
            'missing@',
            '@nodomain.com',
            'double@@email.com',
            'spaces in@email.com',
        ];

        foreach ($invalidEmails as $email) {
            $result = $this->validateForm([
                'name'    => 'Ahmad Ali',
                'email'   => $email,
                'subject' => 'Test Subject',
                'message' => 'Test message.',
            ]);

            $this->assertFalse(
                $result['success'],
                "[POS-21] '$email' should fail validation"
            );
        }
    }

    // ─────────────────────────────────────────────────────
    // POS-22: Valid email formats — data-driven
    // ─────────────────────────────────────────────────────
    public function testValidEmailPasses(): void
    {
        $validEmails = [
            'ahmad@example.com',
            'user.name@domain.org',
            'test123@mail.co.uk',
        ];

        foreach ($validEmails as $email) {
            $result = $this->validateForm([
                'name'    => 'Ahmad Ali',
                'email'   => $email,
                'subject' => 'Test Subject',
                'message' => 'Test message.',
            ]);

            $this->assertTrue(
                $result['success'],
                "[POS-22] '$email' should pass validation"
            );
        }
    }

    // ─────────────────────────────────────────────────────
    // POS-23: Missing message field should fail
    // ─────────────────────────────────────────────────────
    public function testMissingMessageFails(): void
    {
        $result = $this->validateForm([
            'name'    => 'Ahmad Ali',
            'email'   => 'ahmad@example.com',
            'subject' => 'Demo Subject',
            'message' => '',
        ]);

        $this->assertFalse($result['success'], "[POS-23] Empty message must fail");
    }

    // ─────────────────────────────────────────────────────
    // POS-24: All fields valid — full success case
    // ─────────────────────────────────────────────────────
    public function testAllFieldsValidSuccess(): void
    {
        $result = $this->validateForm([
            'name'    => 'Ahmad Ali',
            'email'   => 'ahmad@example.com',
            'subject' => 'Interested in QuickPOS',
            'message' => 'I would like to know more.',
        ]);

        $this->assertTrue($result['success'], "[POS-24] Valid form must succeed");
        $this->assertStringContainsString(
            'Ahmad Ali',
            $result['message'],
            "[POS-24] Success message must include user name"
        );
    }
}