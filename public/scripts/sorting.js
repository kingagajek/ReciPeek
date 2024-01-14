document.getElementById('sort').addEventListener('change', function() {
    console.log('Selection changed');
    const selectedOption = this.options[this.selectedIndex];
    const sortType = selectedOption.getAttribute('data-sort-type');
    const sortDirection = selectedOption.getAttribute('data-sort-direction');

    console.log('Sort Type:', sortType); // Debugging
    console.log('Sort Direction:', sortDirection);

    // Call a generic sorting function with parameters for type and direction
    sortRecipes(sortType, sortDirection);
});

function sortRecipes(sortType, sortDirection) {
    console.log('Sorting recipes...');
    // Get the container and the list of recipe cards
    var container = document.querySelector(".recipe-grid");
    var recipes = Array.from(container.getElementsByClassName("recipe-card"));

    // Define a sorting function based on sortType and sortDirection
    const sortFunction = (a, b) => {
        let valueA, valueB;

        switch (sortType) {
            case 'rating':
                valueA = parseFloat(a.querySelector('.recipe-rating span').textContent);
                valueB = parseFloat(b.querySelector('.recipe-rating span').textContent);
                break;
            case 'time':
                valueA = parseInt(a.querySelector('.time-info span').textContent.split(' ')[0]); // Assuming the format is like "30 mins"
                valueB = parseInt(b.querySelector('.time-info span').textContent.split(' ')[0]);
                break;
            case 'ingredients':
                // Assuming you have a data-ingredients attribute or similar to sort by
                valueA = parseInt(a.getAttribute('data-ingredients'));
                valueB = parseInt(b.getAttribute('data-ingredients'));
                break;
            case 'difficulty':
                // You'll need a way to quantify difficulty, perhaps with a data attribute
                valueA = a.getAttribute('data-difficulty'); // Assuming 'easy' < 'medium' < 'hard'
                valueB = b.getAttribute('data-difficulty');
                break;
            // add more cases as needed
            default:
                // default to some known sort, like rating or alphabetical by title
                valueA = parseFloat(a.querySelector('.recipe-rating span').textContent);
                valueB = parseFloat(b.querySelector('.recipe-rating span').textContent);
                break;
        }

        // Compare for ascending or descending
        if (sortDirection === 'ASC') {
            return valueA > valueB ? 1 : valueA < valueB ? -1 : 0;
        } else {
            return valueA < valueB ? 1 : valueA > valueB ? -1 : 0;
        }
    };

    // Sort the recipes array
    recipes.sort(sortFunction);

    // Clear the container and append the sorted elements
    container.innerHTML = '';
    recipes.forEach(recipe => container.appendChild(recipe));
}
