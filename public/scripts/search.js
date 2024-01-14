const searchInput = document.querySelector('input[placeholder="Search recipe"]');
const recipeContainer = document.querySelector("div.recipe-grid");

(async () => {
    const url = new URLSearchParams(window.location.search);
    searchInput.value = url.get("name");
    await searchFn();
})();

searchInput.addEventListener("keyup", function(event) {
    searchFn(event);
});

async function searchFn(event = {}) {
    if (event.key === "Enter" || Object.keys(event).length === 0) {
        if (event.preventDefault) event.preventDefault();

        const data = { search: searchInput.value };

        try {
            const response = await fetch("/search", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            });

            const recipes = await response.json();
            recipeContainer.innerHTML = "";
            loadRecipes(recipes);
        } catch (error) {
            console.error('Error during fetch:', error);
        }
    }
}

function loadRecipes(recipes) {
    recipes.forEach(recipe => {
        createRecipe(recipe);
    });
}

function createRecipe(recipe) {
    const template = document.querySelector("#result-template");

    const clone = template.content.cloneNode(true);
    const a = clone.querySelector("a");
    a.setAttribute('data-time', recipe.cook_time);
    a.setAttribute('data-difficulty', recipe.id_difficulty);
    a.setAttribute('data-rating', recipe.calculatedRating ?? 0);
    a.setAttribute('data-ratingCount', recipe.ratingCount ?? 0);
    if (a && recipe && recipe.id !== undefined) {
        a.href = `/recipe?recipe_id=${recipe.id}`;
    } else {
        console.error('Anchor tag or recipe ID not found.');
    }
    const img = clone.querySelector("img");
    img.src = `/public/uploads/${recipe.image}`;
    const h3 = clone.querySelector("h3");
    h3.innerHTML = recipe.title;
    const description = clone.querySelector("p");
    description.innerHTML = recipe.description;
    const time = clone.querySelector(".time-info span");
    time.innerHTML = recipe.cook_time + " mins";
    const difficulty = clone.querySelector(".difficulty-info span");
    difficulty.innerHTML = recipe.level; //bedzie trzeba zgetowac difficulty
    const rating = clone.querySelector(".recipe-rating span");
    if (recipe.calculatedRating && recipe.ratingCount) {
        rating.innerHTML = `${recipe.calculatedRating} (${recipe.ratingCount} reviews)`;
    } else {
        rating.innerHTML = '0 (0 reviews)';
    }

    recipeContainer.appendChild(clone);
}