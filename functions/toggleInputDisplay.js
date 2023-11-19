const toggleDisplay = (artistID, event) => {
    

    const elementsToChange = document.querySelectorAll(".artist_" + artistID);
    console.log(elementsToChange);
    
    // Javascript woo!
    elementsToChange.forEach(element => {
        if (element.tagName.toLowerCase() !== 'input') {
            event.preventDefault();
            const text = element.textContent;
            const input = document.createElement("input");
            input.type = "text";
            input.value = text.trim();
            input.classList.add("artist_" + artistID);
            
            if (element.classList.contains("name")) {
                console.log(element.classList);
                console.log("IT CONTAINS NAME")
                input.name = "artist_name";
            } else if (element.classList.contains("birthdate")) {
                console.log(element.classList);
                input.name = "artist_birthdate";
                console.log("IT CONTAINS BIRTHDATE")
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

    const editButton = document.querySelector(".editartist_" + artistID);
    if (editButton.classList.contains("edit")) {
        console.log("yep this is an edit button, therefore we change it to a save!");
        // newbutton.onclick = ();
        editButton.classList.remove("edit");
        editButton.classList.add('save');

        editButton.type = "submit";
        editButton.textContent = "Save";

    } else {
        console.log("returning?");
        return;
        // console.log("yep this is a save button, therefore we change it to an edit!");
        
        // editButton.classList.remove("save");
        // editButton.classList.add("edit");
        // editButton.textContent = "Edit Artist";
        // editButton.type = "button";
    }

    // ADD TOGGLE BUTTON
    // FIND IT FIRST.
    // SET UP A TOGGLE
    // GIVE IT A FUNCTION.
};