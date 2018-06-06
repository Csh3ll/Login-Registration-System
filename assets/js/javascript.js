let columns;
let index = 0;

function test() {
    if (!document.getElementById('file').files.length) {
        alert("Izbrana ni nobena slika.");

        return;
    }

    var file = document.getElementById('file').files[0];
    var reader  = new FileReader();
    reader.onload = function(e)  {
        let pixContainer = createPixContainer();
        pixContainer.image.src = e.target.result;
        pixContainer.caption.textContent = document.getElementById("captionInput").value;
        columns[index%3].prepend(pixContainer.pixContainer);

        $('button.likeButton').on("click", function(event) {
            $(event.target).css({ fill: "#ff0000" });
          });

        $('button.deleteButton').on("click", deleteImage);

        index++;

        document.getElementById("captionInput").value = "";

        document.getElementById('file').value = "";
     }
     reader.readAsDataURL(file);
}

function onStart() {
     columns = document.querySelectorAll(".column");

     $('button.likeButton').on("click", function(event) {
        $(event.target).css({ fill: "#ff0000" });
      });

      $('button.deleteButton').on("click", deleteImage);

}

function createPixContainer() {
    let pixContainer = document.createElement("div");
    pixContainer.classList.add("pix-container");

    //template literal for multiline
    pixContainer.insertAdjacentHTML("afterbegin", 
    `<div>
        <a href=""><img alt="image" class="image"/></a>
    </div>
    <div class="likeBtn">
        <button type="button" class="likeButton">
            <svg class="heart" version="1.1" viewBox="0 0 32 32" width="13" height="13" aria-hidden="false">
                <path d="M17.4 29c-.8.8-2 .8-2.8 0l-12.3-12.8c-3.1-3.1-3.1-8.2 0-11.4 3.1-3.1 8.2-3.1 11.3 0l2.4 2.8 2.3-2.8c3.1-3.1 8.2-3.1 11.3 0 3.1 3.1 3.1 8.2 0 11.4l-12.2 12.8z">
                </path>
            </svg>
        </button>
        <button type="button" class="deleteButton">
            Delete
        </button>
    </div>
    <div class="captionWrapper" contenteditable="true">
        <p class="caption"></p>    
    </div>`);

    return {
        pixContainer,
        anchor: pixContainer.firstElementChild.firstElementChild,
        image: pixContainer.firstElementChild.firstElementChild.firstElementChild,
        caption: pixContainer.lastElementChild.firstElementChild
    };
}

function deleteImage(event) {
    let pixContainer = $(event.target).closest(".pix-container").get(0);
    
    pixContainer.parentElement.removeChild(pixContainer);
}
