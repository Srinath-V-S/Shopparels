</div><br/><br/>
<footer class="text-center"><b>&copy;Copyright 2015-2019 Shopparels</b></footer>


<script>
<!-- Ajax call to dynamically open detail modals -->
function  detailsmodal(id) {
    var data = {'id':id}; // data is json
    jQuery.ajax({           // ajax sends the id data
        url : "/Shopparels/includes/detailsmodal.php",    //url is where request is going to be sent    // async so page need not be loaded'
        method : "post",
        data : data,
        success : function (data) {
            jQuery('body').append(data);// appends the modal html part for particular id(data) before body
            jQuery('#details-modal').modal('toggle'); // selects the detail modal
        },
        error : function (){
            alert("Something is wrong!!");
        }
    });
}


</script>
</body>
</html>