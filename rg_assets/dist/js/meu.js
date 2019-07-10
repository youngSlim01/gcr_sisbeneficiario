
  ambillData();
  function ambillData() {
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()."projecto" ?>',
      dataType: 'json',
      success: function(data) {
        console.log(data)
      }
    });
  }
