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
}