  
// A $( document ).ready() block.
$( document ).ready(function() {
    $('.dropify').dropify();
  });
      // pdf-to-image.js
  document.getElementById('convertBtn').addEventListener('click', async () => {
    const fileInput = document.getElementById('pdfFile');
    if (fileInput.files.length > 0) {
      const file = fileInput.files[0];
  
  
      const pdfData = await readFileAsArrayBuffer(file);
      const images = await convertPdfToImages(pdfData);
  
      const imageContainer = document.getElementById('imageContainer');
      imageContainer.innerHTML = '';
  
      images.forEach(imageData => {
        // const img = new Image();
        // img.src = imageData;
        // imageContainer.appendChild(img);
      //   console.log(imageData);
        var PDFNAME = $("#pdfNameId").val();
        
        downloadBlobImage(imageData,PDFNAME);
        downloadFile(file, PDFNAME);
  
  
      });
    }
  });
  
  $(document).on('change','#pdfFile',async function(){
    const fileInput = document.getElementById('pdfFile');
    if (fileInput.files.length > 0) {
      const file = fileInput.files[0];
  
  
      const pdfData = await readFileAsArrayBuffer(file);
      const images = await convertPdfToImages(pdfData);
  
      const imageContainer = document.getElementById('imageContainer');
      imageContainer.innerHTML = '';
  
      images.forEach(imageData => {
        const img = new Image();
        img.src = imageData;
        imageContainer.appendChild(img);
      //   console.log(imageData);
        // var PDFNAME = $("#pdfNameId").val();
        
        // downloadBlobImage(imageData,PDFNAME);
        // downloadFile(file, PDFNAME);
  
  
      });
    }
  });
  
  function readFileAsArrayBuffer(file) {
    return new Promise((resolve, reject) => {
      const reader = new FileReader();
  
      reader.onload = () => {
        resolve(reader.result);
      };
  
      reader.onerror = () => {
        reject(reader.error);
      };
  
      reader.readAsArrayBuffer(file);
    });
  }
  
  function convertPdfToImages(pdfData) {
    return new Promise((resolve, reject) => {
      const loadingTask = pdfjsLib.getDocument({ data: pdfData });
  
      loadingTask.promise
        .then(pdf => {
          const numPages = pdf.numPages;
          const imagePromises = [];
  
          // for (let pageNum = 1; pageNum <= numPages; pageNum++) {
          //   imagePromises.push(convertPageToImage(pdf, pageNum));
          // }
          imagePromises.push(convertPageToImage(pdf, 1));
  
  
          Promise.all(imagePromises)
            .then(images => resolve(images))
            .catch(error => reject(error));
        })
        .catch(error => reject(error));
    });
  }
  
  function convertPageToImage(pdf, pageNum) {
    return new Promise((resolve, reject) => {
      pdf.getPage(pageNum).then(page => {
        const canvas = document.createElement('canvas');
        const viewport = page.getViewport({ scale: 1.5 });
        const context = canvas.getContext('2d');
  
        canvas.height = viewport.height;
        canvas.width = viewport.width;
  
        const renderContext = {
          canvasContext: context,
          viewport: viewport
        };
  
        page.render(renderContext).promise
          .then(() => {
            const imageData = canvas.toDataURL('image/png');
            resolve(imageData);
          })
          .catch(error => reject(error));
      });
    });
  }
  
  
  function downloadBlobImage(blobUrl, filename) {
    // Create an anchor element
    const anchor = document.createElement('a');
    anchor.href = blobUrl;
  
    // Set the download attribute to the desired filename
    anchor.download = filename;
  
    // Programmatically click the anchor to start the download
    anchor.click();
  }
  
  function downloadFile(file, filename) {
    const blobUrl = URL.createObjectURL(file);
  
    // Create an anchor element
    const anchor = document.createElement('a');
    anchor.href = blobUrl;
  
    // Set the download attribute to the desired filename
    anchor.download = filename;
  
    // Programmatically click the anchor to start the download
    anchor.click();
  
    // Release the object URL to free resources
    URL.revokeObjectURL(blobUrl);
  }
  