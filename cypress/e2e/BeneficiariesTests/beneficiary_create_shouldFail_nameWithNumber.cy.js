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
        cy.visit('http://localhost.local:5173/beneficiaries/index');

        cy.contains('Crear').click()

        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');

        // Formatea la fecha y hora en el formato necesario
        const formattedDate = `${year}-${month}-${day}`;
        cy.get('select[name=participant]').select(2);
        cy.get('input[name=name]').type('231231').should('have.value', '231231');
        cy.get('input[name=lastname]').type('Cypress').should('have.value', 'Cypress');
        cy.get('input[type=date]').type(formattedDate).should('have.value', formattedDate);
        cy.get('input[name=curp]').type('ESTEESUNCURPFALSOT').should('have.value', 'ESTEESUNCURPFALSOT');
        cy.get('select[name=bloodtype]').select(2);
        cy.get('button[type=submit]').contains('Crear').click()
        cy.get('button').contains('Confirmar').click()
    });
});