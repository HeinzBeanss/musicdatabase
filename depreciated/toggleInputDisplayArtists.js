const toggleDisplay = (artistID, event) => {
    
    const editButton = document.querySelector(".editartist_" + artistID);
    if (editButton.classList.contains("edit")) {
        editButton.classList.remove("edit");
        editButton.classList.add('save');
        editButton.type = "submit";
        editButton.textContent = "Save";
    } else {
        return;
    }

    const elementsToChange = document.querySelectorAll(".artist_" + artistID);
    elementsToChange.forEach(element => {
        if (element.tagName.toLowerCase() !== 'input') {
            event.preventDefault();
            const text = element.textContent;
            const input = document.createElement("input");
            input.type = "text";
            input.value = text.trim();
            input.classList.add("artist_" + artistID);
            if (element.classList.contains("name")) {
                input.name = "artist_name";
            } else if (element.classList.contains("birthdate")) {
                input.name = "artist_birthdate";
            }
            element.replaceWith(input);
        } else {
            const text = element.value;
            const display = document.createElement("p");
            display.textContent = text;
            display.classList.add("artist_" + artistID);
            element.replaceWith(display);
        }
    })
};