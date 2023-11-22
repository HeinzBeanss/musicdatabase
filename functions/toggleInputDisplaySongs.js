const toggleDisplay = (songID, artist_list, album_list, event) => {

    const editButton = document.querySelector(".editsong_" + songID);
    if (editButton.classList.contains("edit")) {
        editButton.classList.remove("edit");
        editButton.classList.add("save");
        editButton.type = "submit";
        editButton.textContent = "Save";
    } else {
        return;
    }

    const elementsToChange = document.querySelectorAll(".song_" + songID);
    console.log(elementsToChange);
    elementsToChange.forEach(element => {
        if (element.tagName.toLowerCase() !== "input" || element.tagName.toLowerCase() !== "select") {
            event.preventDefault();
            const text = element.textContent;
            if (element.classList.contains("name")) {
                const newElement = document.createElement("input");
                newElement.type = "text";
                newElement.maxLength = "40";
                newElement.value = text.trim();
                newElement.name = "song_name";
                newElement.setAttribute("required", "");
                element.replaceWith(newElement);
            } else if (element.classList.contains("length_seconds")) {
                const newElement = document.createElement("input");
                newElement.type = "number";
                newElement.min = "1";
                newElement.max = "10000";
                newElement.name = "song_length";
                newElement.value = text;
                newElement.setAttribute("required", "");
                element.replaceWith(newElement);
            } else if (element.classList.contains("artist_name")) {
                const newElement = document.createElement("select");
                newElement.name = "song_artist";
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
            } else if (element.classList.contains("album_name")) {
                const newElement = document.createElement("select");
                newElement.name = "song_album";
                newElement.setAttribute("required", "");

                const newOption = document.createElement("option");
                newOption.value = "";
                newOption.textContent = "No Album";
                if (element.classList.contains("album_")) {
                    newOption.setAttribute("selected", "");
                }
                album_list.forEach(album => {
                    const newOption = document.createElement("option");
                    newOption.value = album.album_id;
                    newOption.textContent = album.name;
                    if (element.classList.contains("album_" + album.album_id)) {
                        newOption.setAttribute("selected", "");
                    }
                    newElement.appendChild(newOption);
                })

                
                newElement.appendChild(newOption);
                element.replaceWith(newElement);
            };
        } else {
            const text = element.value;
            const display = document.createElement("p");
            display.textContent = text;
            display.classList.add("song_" + songID);
            element.replaceWith(display);
        }
    });
}