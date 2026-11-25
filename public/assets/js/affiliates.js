const affiliateForm = document.querySelector('[data-affiliate-contact]');

if (affiliateForm) {
    affiliateForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        const button = affiliateForm.querySelector('button[type="submit"]');
        const status = affiliateForm.querySelector('[role="status"]');
        if (button.disabled) return;

        button.disabled = true;
        button.textContent = affiliateForm.dataset.sending;
        status.textContent = '';
        status.removeAttribute('data-state');

        try {
            const response = await fetch(affiliateForm.action, {
                method: 'POST',
                headers: { 'Accept': 'application/json' },
                body: new FormData(affiliateForm),
            });
            const result = await response.json();

            if (response.ok && result.success) {
                status.textContent = result.message;
                status.dataset.state = 'success';
                affiliateForm.reset();
            } else {
                let message = result.message || affiliateForm.dataset.error;
                if (result.errors) {
                    const errors = Object.values(result.errors).flat();
                    message = errors.join(' ');
                }
                status.textContent = message;
                status.dataset.state = 'error';
            }
        } catch (error) {
            status.textContent = affiliateForm.dataset.error;
            status.dataset.state = 'error';
        } finally {
            button.disabled = false;
            button.textContent = affiliateForm.dataset.submit;
        }
    });
}
