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
        cy.visit('http://localhost.local:5173/appointments/index');

        cy.contains('Crear').click()

        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const hours = String(today.getHours()).padStart(2, '0');
        const minutes = String(today.getMinutes()).padStart(2, '0');

        // Formatea la fecha y hora en el formato necesario
        const formattedDate = `${year}-${month}-${day}`;
        const formattedTime = `${hours}:${minutes}`;
        cy.get('input[type=date]').type(formattedDate).should('have.value', formattedDate);
        cy.get('input[type=time]').type(formattedTime).should('have.value', formattedTime);
        cy.get('input[type=text]').type('Hola, este registro significa que paso la prueba de cypress').should('have.value', 'Hola, este registro significa que paso la prueba de cypress');
        cy.get('select[name=campaign]').select(2);
        cy.get('select[name=participant]').select(2);
        cy.get('select[name=status]').select(2);
        cy.get('button[type=submit]').contains('Crear').click()
        cy.get('button').contains('Confirmar').click()
    });
});