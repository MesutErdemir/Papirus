if (document.getElementsByClassName("ckeditor5").length) {
  console.log(document.getElementsByClassName("ckeditor5"));
  ClassicEditor
      .create( document.querySelector( 'textarea' ) )
      .then( function (editor) {
           var div = document.querySelector('.ck-editor__editable');
           div.style.minHeight = '300px';
      } )
      .catch( error => {
          console.error( error );
      } );
}
