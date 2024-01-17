const starButtons = document.querySelectorAll(".rate-button");

function rateRecipe() {
    const container = this.parentElement.parentElement.parentElement;
    const recipeId = container.dataset.recipeId;
    const rating = this.dataset.rating;

    fetch(`/rate?id=${recipeId}&rating=${rating}`)
        .then(data => data.json())
        .then(data => {
            if (data.error_message) { alert(data.error_message) }
            else {

                let recipeRatingsCount = 0;
                let recipeRatingsSum = 0;

                for (const [key, value] of Object.entries(data)) {
                    recipeRatingsCount += parseInt(value);
                    recipeRatingsSum += parseInt(key) * parseInt(value);
                }

                let recipeRating = (recipeRatingsSum / recipeRatingsCount).toFixed(2);

                container.querySelector('.recipe-rating-summary').innerText = `${recipeRating} (${recipeRatingsCount} ratings)`;
                container.querySelector('.recipe-rating-stars-full').style.width = `${recipeRating / 5 * 100}%`;
            }
        });
}

function recipeRatingStarsHover() {
    const container = this.parentElement.parentElement.parentElement;
    const rating = parseInt(this.dataset.rating);

    container.querySelector('.recipe-rating-stars-full').style.minWidth = `${rating * 20}%`;
    container.querySelector('.recipe-rating-stars-full').style.maxWidth = `${rating * 20}%`;
}

function recipeRatingStarsHoverReset() {
    const container = this.parentElement.parentElement.parentElement;
    const rating = parseInt(this.dataset.rating);

    container.querySelector('.recipe-rating-stars-full').style.minWidth = ``;
    container.querySelector('.recipe-rating-stars-full').style.maxWidth = ``;
}

starButtons.forEach(button => button.addEventListener("click", rateRecipe));
starButtons.forEach(button => button.addEventListener("mouseenter", recipeRatingStarsHover));
starButtons.forEach(button => button.addEventListener("mouseleave", recipeRatingStarsHoverReset));