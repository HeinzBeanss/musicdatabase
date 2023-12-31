const toggleDisplay = (albumID, artist_list, event) => {
    console.log(artist_list);

    const editButton = document.querySelector(".editalbum_" + albumID);
    if (editButton.classList.contains("edit")) {
        editButton.classList.remove("edit");
        editButton.classList.add("save");
        editButton.type = "submit";
        editButton.textContent = "Save";
    } else {
        return;
    }

    const elementsToChange = document.querySelectorAll(".album_" + albumID);
    elementsToChange.forEach(element => {
        if (element.tagName.toLowerCase() !== 'input' || element.tagName.toLowerCase() !== 'select') {
            event.preventDefault();
            const text = element.textContent;
            // Name
            if (element.classList.contains("name")) {
                const newElement = document.createElement("input");
                newElement.type = "text";
                newElement.value = text.trim();
                newElement.classList.add("album_" + albumID);
                newElement.name = "album_name";
                element.replaceWith(newElement);
            } else if (element.classList.contains("release_year")) {
                const newElement = document.createElement("input");
                newElement.type = "number";
                newElement.value = text.trim();
                newElement.classList.add("album_" + albumID);
                newElement.name = "album_release_year";
                newElement.step = "1";
                newElement.min = "1000";
                newElement.max = "2999";
                element.replaceWith(newElement);
            } else if (element.classList.contains("album_artist")) {
                const newElement = document.createElement("select");
                newElement.classList.add("album_" + albumID);
                newElement.name = "album_artist";
                newElement.setAttribute("required", "");
                artist_list.forEach(artist => {
                    const newOption = document.createElement("option");
                    newOption.value = artist.artist_id;
                    newOption.textContent = artist.name;
                    if (element.classList.contains("artist_" + artist.artist_id)) {
                        newOption.setAttribute("selected", "");
                    }
                    newElement.appendChild(newOption);
                });
                element.replaceWith(newElement);
            }
        } else {
            const text = element.value;
            const display = document.createElement("p");
            display.textContent = text;
            display.classList.add("album_" + albumID);
            element.replaceWith(display);
        }
    })
};

// const testfunc = (e) => {
//     e.preventDefault();
//     console.log("all clear.");
// }