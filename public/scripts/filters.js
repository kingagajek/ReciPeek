document.getElementById('filter-button').addEventListener('click', function() {
    document.getElementById('filter-menu').classList.toggle('active');
});

const triggerFilterSelects = () => {
    const filters = document.querySelectorAll('#filter-menu .filter-select');

    if (!filters || Array.from(filters).length < 1) return;

    filters.forEach(filter => {
        filter.querySelector("button")?.addEventListener('click', function () {
            filter.classList.toggle('active');
        });
    });
}

$(document).ready(triggerFilterSelects);

const filterResults = () => {
    const activeFilters = document.querySelectorAll('#filter-menu input[type="checkbox"]:checked');
    const allResults = document.querySelectorAll('.recipe-grid .recipe-card-link');
    let activeFiltersWithTypes = {};

    if (!allResults || Array.from(allResults).length < 1) {
        return;
    } else if (!activeFilters || Array.from(activeFilters).length < 1) {
        allResults.forEach(result => result.classList.remove('hidden'));
    } else {
        activeFilters.forEach(activeFilter => {
            const activeFilterType = activeFilter.getAttribute('name');

            if (activeFiltersWithTypes.hasOwnProperty(activeFilterType)) {
                activeFiltersWithTypes[activeFilterType].push(activeFilter.value);
            } else {
                activeFiltersWithTypes[activeFilterType] = [activeFilter.value];
            }
        });

        allResults.forEach(result => {
            let resultMeetsFilterCriteria = {};

            for (const [filterType, filterValues] of Object.entries(activeFiltersWithTypes)) {
                const resultAttribute = result.getAttribute(`data-${filterType}`);

                resultMeetsFilterCriteria[filterType] = false;

                filterValues.forEach(filterValue => {
                    if (!isNaN(filterValue) && resultAttribute == filterValue) {
                        resultMeetsFilterCriteria[filterType] = true;
                    } else if (isNaN(filterValue)) {
                        if (filterValue[0] === '+' && resultAttribute == filterValue.substr(1)) {
                            resultMeetsFilterCriteria[filterType] = true;
                        } else if (filterValue.split('-').length > 1
                            && parseFloat(resultAttribute) >= parseFloat(filterValue.split('-')[0])
                            && parseFloat(resultAttribute) <= parseFloat(filterValue.split('-')[1])) {
                            resultMeetsFilterCriteria[filterType] = true;
                        }
                    }
                });
            }

            if (!Object.values(resultMeetsFilterCriteria).includes(false)) result.classList.remove('hidden');
            else result.classList.add('hidden');
        });
    }
}

const filterCheckboxes = () => {
    const filters = document.querySelectorAll('#filter-menu .filter-select');

    if (!filters || Array.from(filters).length < 1) return;

    filters.forEach(filter => {
        const filterOptions = filter.querySelectorAll('input[type="checkbox"]');

        if (!filterOptions || Array.from(filterOptions).length < 1) return;

        filterOptions.forEach(filterOption => {
            filterOption.addEventListener('change', filterResults);
        });
    });
}

$(document).ready(filterCheckboxes);