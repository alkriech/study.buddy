$("input[type='password'][data-eye]").each(function(i) {
    var $this = $(this),
        id = 'eye-password-' + i,
        el = $('#' + id);

    $this.wrap($("<div/>", {
        style: 'position:relative',
        id: id
    }));

    $this.css({
        paddingRight: 40
    });

    $this.after($("<div/>", {
        html: '<i class="fa fa-eye"></i>',
        class: 'btn btn-sm btn-icon',
        id: 'passeye-toggle-' + i,
    }).css({
        position: 'absolute',
        right: 10,
        top: ($this.outerHeight() / 2) - 17,
        cursor: 'pointer',
        color: '#ffffff',
        fontSize: '18px',
    }));

    $this.after($("<input/>", {
        type: 'hidden',
        id: 'passeye-' + i
    }));

    var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

    if (invalid_feedback.length) {
        $this.after(invalid_feedback.clone());
    }

    $this.on("keyup paste", function() {
        $("#passeye-" + i).val($(this).val());
    });

    $("#passeye-toggle-" + i).on("click", function() {
        if ($this.hasClass("show")) {
            $this.attr('type', 'password');
            $this.removeClass("show");
            $(this).html('<i class="fa fa-eye"></i>');
        } else {
            $this.attr('type', 'text');
            $this.val($("#passeye-" + i).val());
            $this.addClass("show");
            $(this).html('<i class="fa fa-eye-slash"></i>');
        }
    });
});

