const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function (e) {
            // Basculer entre 'password' et 'text' pour afficher/masquer le mot de passe
            const type = password.type === 'password' ? 'text' : 'password';
            password.type = type;

            // Basculer l'icône de l'œil
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });

    
