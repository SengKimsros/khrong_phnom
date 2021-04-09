/// <reference path="jquery-1.2.6-vsdoc.js" />
(function($) {
    var image_id=0;
    var original_image_width=0;
    var original_image_height=0;
    $.fn.annotateImage = function(options) {
        ///	<summary>
        ///		Creates annotations on the given image.
        ///     Images are loaded from the "getUrl" propety passed into the options.
        ///	</summary>
        var opts = $.extend({}, $.fn.annotateImage.defaults, options);
        var image = this;
        this.image = this;
        this.mode = 'view';
        // Assign defaults
        this.getUrl = opts.getUrl;
        this.saveUrl = opts.saveUrl;
        this.deleteUrl = opts.deleteUrl;
        this.editable = opts.editable;
        this.useAjax = opts.useAjax;
        this.notes = opts.notes;
        image_id=opts.image_id;




        // Add the canvas
        this.canvas = $('<div class="image-annotate-canvas" style="white-space:no-rup"><div class="image-annotate-view"></div><div class="image-annotate-edit"><div class="image-annotate-edit-area"></div></div></div>');
        this.canvas.children('.image-annotate-edit').hide();
        this.canvas.children('.image-annotate-view').hide();
        this.image.after(this.canvas);


        // width height of image
        image_size=new Image();
        image_size.src=this.attr('src');

        setTimeout(() => {
            original_image_width=image_size.naturalWidth;
            original_image_height=image_size.naturalHeight;
            this.canvas.height(image_size.naturalHeight);
            this.canvas.width(image_size.naturalWidth);
            this.canvas.css('background-image', 'url("' + this.attr('src') + '")');
            this.canvas.css('background-siz','contain');
            this.canvas.children('.image-annotate-view, .image-annotate-edit').height(image_size.naturalHeight);
            this.canvas.children('.image-annotate-view, .image-annotate-edit').width(image_size.naturalWidth);

            // Add the behavior: hide/show the notes when hovering the picture
            this.canvas.hover(function() {
                if ($(this).children('.image-annotate-edit').css('display') == 'none') {
                    $(this).children('.image-annotate-view').show();
                }
            }, function() {
                $(this).children('.image-annotate-view').hide();
            });

            this.canvas.children('.image-annotate-view').hover(function() {
                $(this).show();
            }, function() {
                $(this).hide();
            });
            // load the notes
            $.fn.annotateImage.load(this);
            // if (this.useAjax) {
            //     $.fn.annotateImage.ajaxLoad(this);
            // } else {
            //     $.fn.annotateImage.load(this);
            // }

            // Add the "Add a note" button
            if (this.editable) {
                this.button = $('<a class="image-annotate-add" id="image-annotate-add" href="#">Add Note</a>');
                this.button.click(function() {
                    $('#image-annotate-add').hide();
                    $.fn.annotateImage.add(image);
                });
                this.canvas.after(this.button);
            }

            // Hide the original
            this.hide();

            return this;
        }, 1000);



        // Give the canvas and the container their size and background

    };

    /**
    * Plugin Defaults
    **/
    $.fn.annotateImage.defaults = {
        getUrl: 'plan.rails',
        saveUrl: 'your-save.rails',
        deleteUrl: 'your-delete.rails',
        editable: true,
        useAjax: true,
        notes: new Array()
    };

    $.fn.annotateImage.clear = function(image) {
        ///	<summary>
        ///		Clears all existing annotations from the image.
        ///	</summary>
        for (var i = 0; i < image.notes.length; i++) {
            image.notes[image.notes[i]].destroy();
        }
        image.notes = new Array();
    };

    $.fn.annotateImage.ajaxLoad = function(image) {
        ///	<summary>
        ///		Loads the annotations from the "getUrl" property passed in on the
        ///     options object.
        ///	</summary>
        $.getJSON(image.getUrl + '?ticks=' + $.fn.annotateImage.getTicks(), function(data) {
            image.notes = data;
            $.fn.annotateImage.load(image);
        });
    };

    $.fn.annotateImage.load = function(image) {
        ///	<summary>
        ///		Loads the annotations from the notes property passed in on the
        ///     options object.
        ///	</summary>
        for (var i = 0; i < image.notes.length; i++) {
            image.notes[image.notes[i]] = new $.fn.annotateView(image, image.notes[i]);
        }
    };

    $.fn.annotateImage.getTicks = function() {
        ///	<summary>
        ///		Gets a count og the ticks for the current date.
        ///     This is used to ensure that URLs are always unique and not cached by the browser.
        ///	</summary>
        var now = new Date();
        return now.getTime();
    };

    $.fn.annotateImage.add = function(image) {
        ///	<summary>
        ///		Adds a note to the image.
        ///	</summary>
        if (image.mode == 'view') {
            // image.mode = 'edit';

            // Create/prepare the editable note elements
            var editable = new $.fn.annotateEdit(image);

            $.fn.annotateImage.createSaveButton(editable, image);
            // $.fn.annotateImage.createCancelButton(editable, image);
        }
    };
    var ok = $('<a class="image-annotate-edit-ok">OK</a>');
    $.fn.annotateImage.createSaveButton = function(editable, image, note) {
        ///	<summary>
        ///		Creates a Save button on the editable note.
        ///	</summary>


        ok.click(function() {
            var form = $('#image-annotate-edit-form form');
            image.mode = 'view';

            // Save via AJAX
            if (image.useAjax) {
                $.ajax({
                    url: image.saveUrl,
                    data:form.serialize(),
                    error: function(e) { alert('error ajax save !!'); },
                    success: function(data) {
                        if(data.success){
                            alert(data.success);
                        }
                        if (data.annotation_id != undefined) {
                            editable.note.id = data.annotation_id;
                        }
                    },
                        dataType: "json"
                    });

                }

            // Add to canvas
            if (note) {
                note.resetPosition(editable, form_data);
            } else {
                editable.note.editable = true;
                note = new $.fn.annotateView(image, editable.note)
                note.resetPosition(editable, form_data);
                image.notes.push(editable.note);
            }

            editable.destroy();
        });
        editable.form.append(ok);
    };

    $.fn.annotateImage.createCancelButton = function(editable, image) {
        ///	<summary>
        ///		Creates a Cancel button on the editable note.
        ///	</summary>
        var cancel = $('<a class="image-annotate-edit-close">Cancel</a>');
        cancel.click(function() {
            $('#project').removeAttr('disabled');
            editable.destroy();
            image.mode = 'view';
        });
        editable.form.append(cancel);
    };

    $.fn.annotateImage.saveAsHtml = function(image, target) {
        var element = $(target);
        var html = "";
        for (var i = 0; i < image.notes.length; i++) {
            html += $.fn.annotateImage.createHiddenField("text_" + i, image.notes[i].title);
            html += $.fn.annotateImage.createHiddenField("top_" + i, image.notes[i].top);
            html += $.fn.annotateImage.createHiddenField("left_" + i, image.notes[i].left);
            html += $.fn.annotateImage.createHiddenField("height_" + i, image.notes[i].height);
            html += $.fn.annotateImage.createHiddenField("width_" + i, image.notes[i].width);
        }
        element.html(html);
    };

    $.fn.annotateImage.createHiddenField = function(name, value) {
        return '&lt;input type="hidden" name="' + name + '" value="' + value + '" /&gt;<br />';
    };

    $.fn.annotateEdit = function(image, note) {
        ///	<summary>
        ///		Defines an editable annotation area.
        ///	</summary>
        this.image = image;

        if (note) {
            this.note = note;
        } else {
            var newNote =new Object();
            newNote.id = "new";
            newNote.top = 30;
            newNote.left = 30;
            newNote.width = 30;
            newNote.height = 30;
            newNote.right=0;
            this.note = newNote;
            $('input[name=fm_height]').val(30);
            $('input[name=fm_width]').val(30);
            $('input[name=fm_top]').val(30);
            $('input[name=fm_left]').val(30);
        }

        // Set area
        var area = image.canvas.children('.image-annotate-edit').children('.image-annotate-edit-area');
        this.area = area;
        this.area.css('height', this.note.height + 'px');
        this.area.css('width', this.note.width + 'px');
        this.area.css('left', this.note.left + 'px');
        this.area.css('top', this.note.top + 'px');
        this.area.css('right',this.note.right+'px');




        // Show the edition canvas and hide the view canvas
        image.canvas.children('.image-annotate-view').hide();
        image.canvas.children('.image-annotate-edit').show();
        var form = $('');
        this.form = form;

        $('body').append(this.form);
        this.form.css('left', this.area.offset().left + 'px');
        this.form.css('top', (parseInt(this.area.offset().top) + parseInt(this.area.height()) + 7) + 'px');



        // Set the area as a draggable/resizable element contained in the image canvas.
        // Would be better to use the containment option for resizable but buggy
        area.resizable({
            handles: 'all',
            stop: function(e, ui) {
                form.css('left', area.offset().left + 'px');
                form.css('top', (parseInt(area.offset().top) + parseInt(area.height()) + 2) + 'px');
                $('input[name=fm_height]').val($('.image-annotate-edit-area').height());
                $('input[name=fm_width]').val($('.image-annotate-edit-area').width());
                $('input[name=fm_top]').val($('.image-annotate-edit-area').css('top'));
                $('input[name=fm_left]').val($('.image-annotate-edit-area').css('left'));

            }
        })
        .draggable({
            containment: image.canvas,
            drag: function(e, ui) {
                form.css('left', area.offset().left + 'px');
                form.css('top', (parseInt(area.offset().top) + parseInt(area.height()) + 2) + 'px');
                $('input[name=fm_height]').val($('.image-annotate-edit-area').height());
                $('input[name=fm_width]').val($('.image-annotate-edit-area').width());
                $('input[name=fm_top]').val(parseInt($('.image-annotate-edit-area').css('top')));
                $('input[name=fm_left]').val(parseInt($('.image-annotate-edit-area').css('left')));
            },
            stop: function(e, ui) {
                form.css('left', area.offset().left + 'px');
                form.css('top', (parseInt(area.offset().top) + parseInt(area.height()) + 2) + 'px');
                $('input[name=fm_height]').val($('.image-annotate-edit-area').height());
                $('input[name=fm_width]').val($('.image-annotate-edit-area').width());
                $('input[name=fm_top]').val($('.image-annotate-edit-area').css('top'));
                $('input[name=fm_left]').val($('.image-annotate-edit-area').css('left'));
            }
        });
        return this;
    };

    $.fn.annotateEdit.prototype.destroy = function() {
        ///	<summary>
        ///		Destroys an editable annotation area.
        ///	</summary>
        this.image.canvas.children('.image-annotate-edit').hide();
        this.area.resizable('destroy');
        this.area.draggable('destroy');
        this.area.css('height', '');
        this.area.css('width', '');
        this.area.css('left', '');
        this.area.css('top', '');
        this.form.remove();
    }

    $.fn.annotateView = function(image, note) {
        ///	<summary>
        ///		Defines a annotation area.
        ///	</summary>
        this.image = image;

        this.note = note;

        this.editable = (note.editable && image.editable);

        // Add the area
        this.area = $('<div class="image-annotate-area' + (this.editable ? ' image-annotate-area-editable' : '') + '"><div></div></div>');
        image.canvas.children('.image-annotate-view').prepend(this.area);

        // Add the note
        this.form=$('<div class="image-annotate-note card">'+
                                '<div class="white-box pro-cart">'+
                                '<img src="/storage/'+note.image+'" width="200px" height="100px">'+
                                '<div class="table-responsive">'+
                                    '<table class="table">'+
                                        '<tbody>'+
                                            '<tr>'+
                                                '<td>Title</td>'+
                                                '<td>'+note.title+'5</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Price</td>'+
                                                '<td>$'+note.price+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Size</td>'+
                                                '<td>'+note.size+'/m2</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Bed Rooms</td>'+
                                                '<td>'+note.bed_rooms+'</td>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td>Bath Rooms</td>'+
                                                '<td>'+note.bath_rooms+'</td>'+
                                            '</tr>'+
                                        '</tbody>'+
                                    '</table>'+
                                '</div>'+
                            '</div>'+
                    '</div>');
        // this.form = $('<div class="image-annotate-note">' + note.text + '</div>');
        this.form.hide();
        image.canvas.children('.image-annotate-view').append(this.form);
        this.form.children('span.actions').hide();

        // Set the position and size of the note
        this.setPosition();

        // Add the behavior: hide/display the note when hovering the area
        var annotation = this;
        this.area.hover(function() {
            annotation.show();

        }, function() {
            annotation.hide();
        });

        // Edit a note feature
        if (this.editable) {
            var form = this;
            this.area.click(function() {
                form.edit();
            });
        }
    };

    $.fn.annotateView.prototype.setPosition = function() {
        ///	<summary>
        ///		Sets the position of an annotation.
        ///	</summary>
        this.area.children('div').height((parseInt(this.note.height) - 2) + 'px');
        this.area.children('div').width((parseInt(this.note.width) - 2) + 'px');
        this.area.css('left', (this.note.left) + 'px');
        this.area.css('top', (this.note.top) + 'px');
        if(this.note.left>=(original_image_width-240) && this.note.top>=(original_image_height-350)){
            this.form.css('left',((this.note.left)-240-this.note.width)+'px');
            this.form.css('top', (parseInt(this.note.top -350) - parseInt(this.note.height) + 7) + 'px');
        }else if(this.note.left>=(original_image_width-240)){
            this.form.css('left', (this.note.left-240) + 'px');
            this.form.css('top', (parseInt(this.note.top) + parseInt(this.note.height) + 7) + 'px');
        }else if(this.note.top>=(original_image_height-350)){
            this.form.css('left', (this.note.left-240) + 'px');
            this.form.css('top', (parseInt(this.note.top -350) - parseInt(this.note.height) + 7) + 'px');
        }else{
            this.form.css('left', (this.note.left) + 'px');
            this.form.css('top', (parseInt(this.note.top) + parseInt(this.note.height) + 7) + 'px');
        }

        // if(this.note.height>=(original_image_height-350)){
        //     this.form.css('top', (parseInt((this.note.top)-350) + parseInt(this.note.height)-7) + 'px');
        // }else{
        //
        // }


    };

    $.fn.annotateView.prototype.show = function() {
        ///	<summary>
        ///		Highlights the annotation
        ///	</summary>
        this.form.fadeIn(250);
        if (!this.editable) {
            this.area.addClass('image-annotate-area-hover');
        } else {
            this.area.addClass('image-annotate-area-editable-hover');
        }
    };

    $.fn.annotateView.prototype.hide = function() {
        ///	<summary>
        ///		Removes the highlight from the annotation.
        ///	</summary>
        this.form.fadeOut(250);
        this.area.removeClass('image-annotate-area-hover');
        this.area.removeClass('image-annotate-area-editable-hover');
    };

    $.fn.annotateView.prototype.destroy = function() {
        ///	<summary>
        ///		Destroys the annotation.
        ///	</summary>
        this.area.remove();
        this.form.remove();
    }

    $.fn.annotateView.prototype.edit = function() {
        ///	<summary>
        ///		Edits the annotation.
        ///	</summary>
        if (this.image.mode == 'view') {
            this.image.mode = 'edit';
            var annotation = this;

            // Create/prepare the editable note elements
            var editable = new $.fn.annotateEdit(this.image, this.note);

            $.fn.annotateImage.createSaveButton(editable, this.image, annotation);

            // Add the delete button
            var del = $('<a class="image-annotate-edit-delete">Delete</a>');
            del.click(function() {
                $('#project').removeAttr('disabled');
                var form = $('#image-annotate-edit-form form');

                $.fn.annotateImage.appendPosition(form, editable)

                if (annotation.image.useAjax) {
                    $.ajax({
                        url: annotation.image.deleteUrl,
                        data: form.serialize(),
                        error: function(e) { alert('error deleted !!');     },
                        success: function(data) {
                        if(data.success){
                            alert(data.success);
                        }}
                    });
                }

                annotation.image.mode = 'view';
                editable.destroy();
                annotation.destroy();
            });
            editable.form.append(del);

            $.fn.annotateImage.createCancelButton(editable, this.image);
        }
    };

    $.fn.annotateImage.appendPosition = function(form, editable) {
        ///	<summary>
        ///		Appends the annotations coordinates to the given form that is posted to the server.
        ///	</summary>
        $('input[name=fm_height]').val(editable.area.height());
        $('input[name=fm_width]').val(editable.area.width());
        $('input[name=fm_top]').val(editable.area.position().top);
        $('input[name=fm_left]').val(editable.area.position().left);
        var areaFields = $('<input type="hidden" value="' + editable.area.height() + '" name="height"/>' +
                           '<input type="hidden" value="' + editable.area.width() + '" name="width"/>' +
                           '<input type="hidden" value="' + editable.area.position().top + '" name="top"/>' +
                           '<input type="hidden" value="' + editable.area.position().left + '" name="left"/>' +
                           '<input type="hidden" value="' + editable.note.id + '" name="id"/>'+
                           '<input type="hidden" value="' + image_id + '" name="image_id"/>');
        form.append(areaFields);
    }

    $.fn.annotateView.prototype.resetPosition = function(editable, data) {
        ///	<summary>
        ///		Sets the position of an annotation.
        ///	</summary>
        this.form.html('');
        this.form.hide();

        // Resize
        this.area.children('div').height(editable.area.height() + 'px');
        this.area.children('div').width((editable.area.width() - 2) + 'px');
        this.area.css('left', (editable.area.position().left) + 'px');
        this.area.css('top', (editable.area.position().top) + 'px');
        this.form.css('left', (editable.area.position().left) + 'px');
        this.form.css('top', (parseInt(editable.area.position().top) + parseInt(editable.area.height()) + 7) + 'px');


        if(editable.area.position().left>=(original_image_width-240) && editable.area.position().top>=(original_image_height-350)){
            this.form.css('left',((editable.area.position().left)-240-this.note.width)+'px');
            this.form.css('top', (parseInt(editable.area.position().top -350) - parseInt(this.note.height) + 7) + 'px');
        }else if(editable.area.position().left>=(original_image_width-240)){
            this.form.css('left', (editable.area.position().left-240) + 'px');
            this.form.css('top', (parseInt(editable.area.position().top) + parseInt(this.note.height) + 7) + 'px');
        }else if(editable.area.position().top>=(original_image_height-350)){
            this.form.css('left', (editable.area.position().left-240) + 'px');
            this.form.css('top', (parseInt(editable.area.position().top -350) - parseInt(this.note.height) + 7) + 'px');
        }else{
            this.form.css('left', (editable.area.position().left) + 'px');
            this.form.css('top', (parseInt(editable.area.position().top) + parseInt(this.note.height) + 7) + 'px');
        }

        // Save new position to note
        this.note.top = editable.area.position().top;
        this.note.left = editable.area.position().left;
        this.note.height = editable.area.height();
        this.note.width = editable.area.width();
        this.note.title = data[0];
        this.note.detail=data[1];
        this.note.description=data[2];
        this.note.home_type=data[3];
        this.note.size=data[4];
        this.note.number_of_bedroom=data[5];
        this.note.number_of_bathroom=data[6];
        this.note.base_price=data[7];
        this.note.id = editable.note.id;
        this.editable = true;
    };

})(jQuery);
