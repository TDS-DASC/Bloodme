describe('Load appointments index', () => {
    it('successfully logs in and load index', () => {
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

        cy.location('pathname', {timeout: 8000})
            .should('include', '/dashboard')
        cy.window().then((win) => {
            console.log(win.location)
            })
        cy.visit('http://localhost.local:5173/administrators/3/edit');

        // Formatea la fecha y hora en el formato necesario
        cy.wait(1000);
        cy.get('input[name=name]').clear().type('User edited').should('have.value', 'User edited');
        cy.get('input[name=lastname]').clear().type('Lastname edited').should('have.value', 'Lastname edited');
        cy.get('input[name=email]').clear();

        cy.get('button[type=submit]').contains('Editar').click()
        cy.get('button').contains('Confirmar').click()
    });
});