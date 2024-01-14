document.addEventListener('DOMContentLoaded', function() {
    loadRecipes();
    loadUsers();
});

    function loadRecipes() {
    // Zastąp URL rzeczywistym endpointem API
    fetch('/api/recipes')
        .then(response => response.json())
        .then(data => {
            const table = document.getElementById('recipes-table');
            data.forEach(recipe => {
                const row = table.insertRow();
                row.innerHTML = `
          <td>${recipe.name}</td>
          <td>${recipe.author}</td>
          <td><button onclick="deleteRecipe(${recipe.id})">Delete</button></td>
        `;
            });
        })
        .catch(error => console.error('Error:', error));
}

    function loadUsers() {
    // Zastąp URL rzeczywistym endpointem API
    fetch('/api/users')
        .then(response => response.json())
        .then(data => {
            const table = document.getElementById('users-table');
            data.forEach(user => {
                const row = table.insertRow();
                row.innerHTML = `
          <td>${user.username}</td>
          <td>${user.email}</td>
          <td><button onclick="deleteUser(${user.id})">Delete</button></td>
        `;
            });
        })
        .catch(error => console.error('Error:', error));
}

    function deleteRecipe(recipeId) {
    // Zastąp URL rzeczywistym endpointem API
    fetch(`/api/recipes/${recipeId}`, { method: 'DELETE' })
        .then(response => {
            if(response.ok) {
                loadRecipes(); // Ponownie załaduj przepisy po usunięciu
            }
        })
        .catch(error => console.error('Error:', error));
}

    function deleteUser(userId) {
    // Zastąp URL rzeczywistym endpointem API
    fetch(`/api/users/${userId}`, { method: 'DELETE' })
        .then(response => {
            if(response.ok) {
                loadUsers(); // Ponownie załaduj użytkowników po usunięciu
            }
        })
        .catch(error => console.error('Error:', error));
}
