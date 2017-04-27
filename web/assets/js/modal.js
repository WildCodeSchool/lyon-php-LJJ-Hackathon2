$(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('#MODAL1').modal({
            dismissible: true, // Modal can be dismissed by clicking outside of the modal
            opacity: .5, // Opacity of modal background
            inDuration: 300, // Transition in duration
            outDuration: 200, // Transition out duration
            startingTop: '14%', // Starting top style attribute
            endingTop: '20%' // Ending top style attribute
               }
    );
});

