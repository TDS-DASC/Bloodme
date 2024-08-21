describe('Login page', () => {
    it('successfully loads and logs in', () => {
        // Visit the login page
        cy.visit('http://localhost.local:5173');

        // Perform the request to get the CSRF cookie
        cy.request('http://localhost.local:8000/sanctum/csrf-cookie').then((response) => {
            expect(response.status).to.eq(204);

            // Extract the CSRF token from cookies
            const csrfToken = cy.getCookie('XSRF-TOKEN');
            const sessionToken = cy.getCookie('laravel_session');

            // Perform login
            cy.get('input[type=email]').type('admin@admin.com').should('have.value', 'admin@admin.com');
            cy.get('input[type=password]').type('admin').should('have.value', 'admin');
            cy.contains('Iniciar Sesion').click();

            // Save user info in localStorage
            cy.window().then((win) => {
                win.localStorage.setItem('user', JSON.stringify({ email: 'admin@admin.com', password: 'admin' }));
            });
        });
    });
});

