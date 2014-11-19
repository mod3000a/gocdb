<?php
$services = $params['services'];
$configService = \Factory::getConfigService();
$default_endpoint_name= $configService->GetDefaultEndpointName();

?>
<!-- Dynamically create a select list from a sites services -->
<label> Select Affected Services+Endpoints (Ctrl+click to select)</label> 
<select name="IMPACTED_IDS[]" id="Select_Services" size="10" class="form-control" onclick="" style="width:99%; margin-left:1%" onChange="selectServicesEndpoint()" multiple>
<?php 
    foreach($services as $service){
        $count=0;
        echo "<option value=\"s" . $service->getId() . "\" id=\"" . $service->getId() . "\" SELECTED>" . '('.$service->getServiceType()->getName().') '.$service->getHostName() . "</option>";
        foreach($service->getEndpointLocations() as $endpoint){
            if($endpoint->getName() == ''){
                $name = $default_endpoint_name;
            }else{
                $name = $endpoint->getName();
            }
            //Option styling doesn't work well cross browser so just use 4 spaces to indent the branch            
            echo "<option id=\"".$service->getId()."\" value=\"e" . $endpoint->getId() . "\" SELECTED>&nbsp&nbsp&nbsp&nbsp-" . $name . "</option>";
            $count++;
        }
        
    }
?>	
</select>