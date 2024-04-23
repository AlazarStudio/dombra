function getData(tableName, id) {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: 'admin/includes/CRUD/getDataFromDB.php',
            type: 'POST',
            data: {
                'id': id,
                'tableName': tableName
            },
            dataType: 'json',
            success: function (data) {
                let dataArray = Object.values(data);
                resolve(dataArray);
            },
            error: function (xhr, status, error) {
                console.error('Error:', xhr, status, error);
                reject(error);
            }
        });
    });
}

function stringToImageArray(imageString) {
    return imageString.split(',').map(image => image.trim());
}

// --------------------------------------------------------------------------------------------------------------------

getData("galery").then((response) => {
    let modal = $(".modal-content").empty();
    let img_index = 1;
  
    function insertImages(response) {
  
      let block = $(".gallery").empty();
  
      response.forEach((element, index) => {

        const imageSrcArray = stringToImageArray(element.img);
  
        if (imageSrcArray.length > 1) {
          for (let i = 0; i < imageSrcArray.length; i++) {
            block.append(
              `<div class="gallery_img" onclick="openModal(); currentSlide(${img_index})"><img src="admin/img/${imageSrcArray[i]}" alt=""></div>`
            );
  
            modal.append(`
                <div class="mySlides">
                    <img src="admin/img/${imageSrcArray[i]}" alt="Фото ${img_index}">
                </div>
              `);
            img_index++;
          }
        } else {
          block.append(
            `<div class="gallery_img" onclick="openModal(); currentSlide(${img_index})"><img src="admin/img/${imageSrcArray[0]}" alt=""></div>`
          );
  
          modal.append(`
              <div class="mySlides">
                  <img src="admin/img/${imageSrcArray[0]}" alt="Фото ${img_index}">
              </div>
            `);
          img_index++;
        }
      });
    }
  
    insertImages(response);
  

  });
  
