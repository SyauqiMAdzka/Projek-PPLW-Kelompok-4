document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.password-wrapper').forEach(function (wrapper) {

        const passwordInput = wrapper.querySelector('input[type="password"]');
        const togglePassword = wrapper.querySelector('.password-toggle');

        if (!passwordInput || !togglePassword) {
            return;
        }

        togglePassword.addEventListener('click', function () {

            const isPasswordHidden = passwordInput.type === 'password';
            passwordInput.type = isPasswordHidden ? 'text' : 'password';
            togglePassword.textContent = isPasswordHidden ? 'Hide' : 'Show';
            togglePassword.setAttribute('aria-pressed', String(isPasswordHidden));

        });

    });
});
    const otpInputs = document.querySelectorAll('.otp-input');

otpInputs.forEach((input, index) => {

    input.addEventListener('input', (event) => {

        event.target.value = event.target.value.replace(/\D/g, '');

        if (event.target.value && index < otpInputs.length - 1) {
            otpInputs[index + 1].focus();
        }

    });

    input.addEventListener('keydown', (event) => {

        if (
            event.key === 'Backspace' &&
            !input.value &&
            index > 0
        ) {
            otpInputs[index - 1].focus();
        }

    });

});
    let timeLeft = 120;

const timer = document.getElementById('timer');

if (timer) {

    const countdown = setInterval(() => {

        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;

        timer.textContent =
            `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;

        timeLeft--;

        if (timeLeft < 0) {
            clearInterval(countdown);
            timer.textContent = 'Expired';
        }

    }, 1000);

}
    
