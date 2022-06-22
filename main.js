document.querySelectorAll(".drop__zone--input").forEach(inputElement => {
    const dropZoneElement = inputElement.closest(".drop__zone");

    dropZoneElement.addEventListener("click", e => {
        inputElement.click();
    });

    inputElement.addEventListener("change", e => {
        if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
        }
    })

    dropZoneElement.addEventListener("dragover", e => {
        e.preventDefault();
        dropZoneElement.classList.add("drop__zone--over");
    });

    ["dragleave", "dragend"].forEach(type => {
        dropZoneElement.addEventListener(type, e => {
            dropZoneElement.classList.remove("drop__zone--over"); 
        });
    });

    dropZoneElement.addEventListener("drop", e => {
        e.preventDefault();
        if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);

            dropZoneElement.classList.remove("drop__zone--over");
        };
    });
});g

function updateThumbnail(dropZoneElement, file) {
    let thumbnailElement = dropZoneElement.querySelector(".drop__zone--thumb");

    if (dropZoneElement.querySelector(".drop__zone--prompt")) {
        dropZoneElement.querySelector(".drop__zone--prompt").remove(); 
    }
 
    // first time - there is no thumbnail element
    if (!thumbnailElement) {
        thumbnailElement = document.createElement("div");
        thumbnailElement.classList.add("drop__zone--thumb");
        dropZoneElement.appendChild(thumbnailElement)
    }

    thumbnailElement.dataset.label = file.name; 

    // shows thumbnail for image files
    if (file.type.startsWith("image/")) {
        const reader = new FileReader(); 
 
        reader.readAsDataURL(file);
        reader.onload = () => {
         thumbnailElement.style.backgroundImage = `url('${reader.result}')`
    };
    } else {
        thumbnailElement.style.backgroundImage = null;
    };  
};
