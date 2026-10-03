<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Authentication - Office Inventory</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="verification-page">

        <div class="verification-card">

            {{-- Icon --}}
            <div class="verification-icon">
                ✓
            </div>

            {{-- Title --}}
            <h1>Authentication</h1>

            <p class="verification-description">
                Enter the 6-digit code sent to your email
            </p>

            {{-- Email --}}
            <div class="verification-email">
                <span>✉</span>
                <span>username@email.com</span>
            </div>

            {{-- OTP --}}
            <div class="otp-container">

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                >

                <input
                    type="text"
                    maxlength="1"
                    class="otp-input"
                    inputmode="numeric"
                >

            </div>

            {{-- Timer --}}
            <p class="code-expire">
                Code expires in <span id="timer">02:00</span>
            </p>

            {{-- Verify --}}
            <button
                type="button"
                class="verification-button"
                id="verifyButton"
            >
                Verify account
            </button>

            {{-- Resend --}}
            <button
                type="button"
                class="resend-button"
                id="resendButton"
            >
                Resend code
            </button>

            {{-- Security Information --}}
            <div class="security-info">

                <div class="security-icon">
                    🔒
                </div>

                <div>
                    <strong>Secure office access</strong>

                    <p>
                        Protect your inventory data, purchase orders,
                        and account information.
                    </p>
                </div>

            </div>

            {{-- Back --}}
            <a href="/login" class="back-login">
                ← Back to login
            </a>

        </div>

    </div>

</body>
</html>
