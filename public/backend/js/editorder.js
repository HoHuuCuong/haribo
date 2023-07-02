/* Add here all your JS customizations */
function dataURLToBlob(dataURL) {
    // Code taken from https://github.com/ebidel/filer.js
    var parts = dataURL.split(';base64,');
    var contentType = parts[0].split(":")[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;
    var uInt8Array = new Uint8Array(rawLength);

    for (var i = 0; i < rawLength; ++i) {
        uInt8Array[i] = raw.charCodeAt(i);
    }

    return new Blob([uInt8Array], { type: contentType });
}
(function($) {
    $('.btn-changesign').magnificPopup({
            type: 'inline',
            preloader: false,
            modal: true,
            callbacks: {
                open: function() {
                    var wrapper = document.getElementById("signature-pad");
                    var clearButton = wrapper.querySelector("[data-action=clear]");
                    var changeColorButton = wrapper.querySelector("[data-action=change-color]");
                    var undoButton = wrapper.querySelector("[data-action=undo]");
                    var savePNGButton = wrapper.querySelector("[data-action=save-png]");
                    var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
                    var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");
                    var canvas = wrapper.querySelector("canvas");
                    var signaturePad = new SignaturePad(canvas, {
                      // It's Necessary to use an opaque color when saving image as JPEG;
                      // this option can be omitted if only saving as PNG or SVG
                        backgroundColor: 'rgb(255, 255, 255)'
                    });
                    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
                    canvas.width = canvas.offsetWidth * ratio;
                    canvas.height = canvas.offsetHeight * ratio;
                    canvas.getContext("2d").scale(ratio, ratio);
                    signaturePad.clear();
                    $('.modal-clear').click(function () {
                        signaturePad.clear();
                    });
                    $('.modal-confirm').click(function () {
                        if(signaturePad.isEmpty())
                        {
                            $.msg('Please sign before confirm.','Signature Action','danger');
                        }else{
                            var dataURL = signaturePad.toDataURL("image/jpeg");
                            $('#Signature').attr('src',dataURL);
                            $('#signfile').val(dataURL);
                            //$('#signfile2').value = dataURLToBlob(dataURL);
                            let fd = new FormData(document.forms[1]);
                            fd.append("canvassign", dataURLToBlob(dataURL));
                            //$.msg('Sign success.','Signature Action','success');
                            $.magnificPopup.close();
                        }
                    });
                },
                close: function() {
                    // Will fire when popup is closed
                }
            }
    });
    $(document).on('click', '.modal-dismiss', function (e) {
		e.preventDefault();
		$.magnificPopup.close();
    });
}).apply(this, [jQuery]);
