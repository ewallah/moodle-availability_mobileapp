YUI.add("moodle-availability_mobileapp-form",function(t,a){M.availability_mobileapp=M.availability_mobileapp||{},M.availability_mobileapp.form=t.Object(M.core_availability.plugin),M.availability_mobileapp.form.getNode=function(a){var e,i=M.str.availability_mobileapp,l=i.title+' <span class="availability-group">';return l+='<label><span class="accesshide">'+i.label_access+' </span><select name="e" title="'+i.label_access+'"><option value="1">'+i.requires_app+'</option><option value="2">'+i.requires_notapp+"</option></select></label></span>",e=t.Node.create("<span>"+l+"</span>"),a.e!==undefined&&e.one("select[name=e]").set("value",""+a.e),M.availability_mobileapp.form.addedEvents||(M.availability_mobileapp.form.addedEvents=!0,t.one(".availability-field").delegate("change",function(){M.core_availability.form.update()},".availability_mobileapp select")),e},M.availability_mobileapp.form.fillValue=function(a,e){a.e=parseInt(e.one("select[name=e]").get("value"),10)}},"@VERSION@",{requires:["base","node","event","moodle-core_availability-form"]});