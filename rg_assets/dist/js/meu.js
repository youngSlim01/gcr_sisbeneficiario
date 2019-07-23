$(document).ready(function() {

    var cat = $("#fcategoria")
    var pro = $("#fprojecto")
    var dist = $("#fdistrito")

  $(cat).change(function() {
    if($(this).val()==1){
      $(dist).removeAttr("Disabled", true);
      $("#funidade").removeAttr("Disabled", true);
      $(pro).removeAttr("Disabled",true);
      $("#funidade").removeAttr("Disabled", true);
    }else if($(this).val()==2){
      $(dist).removeAttr("Disabled", true);
      $("#funidade").attr("Disabled", true);
    }else if($(this).val()==3){
      $(dist).attr("Disabled", true);
      $("#funidade").attr("Disabled", true);
      $(pro).removeAttr("Disabled",true);
    }else if($(this).val()==4){
      $(dist).attr("Disabled", true);
      $("#funidade").attr("Disabled", true);
      $(pro).attr("Disabled",true);
    }
  })
});
