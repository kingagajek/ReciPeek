document.getElementById('filter-button').addEventListener('click', function() {
    document.getElementById('filter-menu').style.display = 'block';
});

document.getElementById('meal-type').addEventListener('change', function() {
    let mealType = this.value;
    let checkboxesDiv = document.getElementById('checkboxes');
    checkboxesDiv.innerHTML = ''; // Czyści poprzednie checkboxy

    let options = {
        'breakfast': ['Płatki', 'Jajecznica', 'Owocowe'],
        'lunch': ['Zupa', 'Kanapka', 'Sałatka'],
        'dinner': ['Makaron', 'Stek', 'Ryba']
    };

    if (options[mealType]) {
        options[mealType].forEach(function(option) {
            let checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = option;
            checkbox.id = option;

            let label = document.createElement('label');
            label.htmlFor = option;
            label.appendChild(document.createTextNode(option));

            checkboxesDiv.appendChild(checkbox);
            checkboxesDiv.appendChild(label);
            checkboxesDiv.appendChild(document.createElement('br'));
        });
    }

    checkboxesDiv.style.display = 'block';
});
