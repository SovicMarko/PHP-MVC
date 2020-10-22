$(document).ready(function() {
    var location = window.location.href;
    location = location.substr(24);
    var locationPath = location.split('/');
    console.log(locationPath[1]);
    if (locationPath[1] === undefined || locationPath[1] == 'index') {
        $("#admin").addClass("active");
    } else if (locationPath[1] == 'insert' || locationPath[1] == 'changeRecord') {
        $("#admin-insert").addClass("active");
    } else if (locationPath[1] == 'cathegory') {
        $("#admin-cat").addClass("active");
    }


    $("#confirm-btn").click(function(e){
        if ($("#add-cathegory").val().length == 0) {
            e.preventDefault();
        }
  
        let w = $("#cathegory-form").outerWidth() - $("#confirm-btn").outerWidth() - 4;
        $("#add-cathegory").fadeIn().animate({
          opacity: '1',
          width: w
        });
        setTimeout(function() {
            $("#confirm-btn").html('<i class="glyphicon glyphicon-ok"></i>')
        },1000)

    }); 

    $("#add-cathegory").on('input',function() {
        if ($("#add-cathegory").val().length > 0) {
            $("#confirm-btn").addClass('btn-success');
            $("#confirm-btn").removeClass('btn-default')
        } else {
            $("#confirm-btn").addClass('btn-default');
            $("#confirm-btn").removeClass('btn-success')
        }
        
    });

    $(`.cathegory-plus-btn`).click(function() {
        $(this).toggleClass('glyphicon-chevron-down');
        $(this).toggleClass('glyphicon-chevron-up');
        let id = this.id.substring(12);
        $(this).parent().toggleClass('active-cat');
        
        if ($(`#sub-cat-list${id}`).hasClass('appended')) {
            $(`#sub-cat-list${id}`).removeClass('appended');
            $(`#sub-cat-input${id}`).slideUp('slow', function() {
                $(`#sub-cat-input${id}`).remove();
            });
        } else {
            $(`#sub-cat-list${id}`).append(`
                <form id="sub-cat-input${id}" action="insertSubCathegory/${id}" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" 
                            placeholder="Unesite naziv podkategorije"
                            name="naziv">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-plus"></i>
                            </button>
                        </div>
                    </div>
                </form>
            `);
            // $(`#sub-cat-list${id}`).fadeIn();
            $(`#sub-cat-list${id}`).addClass('appended');
        }

        $(`#sub-cat-list${id}`).slideToggle();
       
    })
    
})