<div x-init-storage>
    <div class="ipnrm-ui-modal-header">
        <div class="ipnrm-ui-close" x-ng-click="appData.modal=false">&times;</div>
        <h4 class="ipnrm-ui-modal-title">Save Config</h4>
    </div>
    <div class="ipnrm-ui-modal-body ipnrm-ui-scroll">
        <div class="ipnrm-ui-info">
            Save the plugin config for later use
        </div>
        
        <div class="ipnrm-ui-form-group">
            <select size="10" x-ng-options="config.name as config.name for config in appData.storage.configs" x-ng-model="appData.storage.configName">
                <option style="display:none" value=""></option>
            </select>
        </div>
        
        <div class="ipnrm-ui-form-group">
            <div class="ipnrm-ui-info">
                Config Name
            </div>
        </div>
        
        <div class="ipnrm-ui-form-group">
            <input id="ipnrm-ui-cfg-name" type="text" x-ng-model="appData.storage.configName" />
        </div>
    </div>
    <div class="ipnrm-ui-modal-footer">
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-savetofile" x-ng-click="appData.fn.storage.saveToFile(appData);">Save To File</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-save" x-ng-click="appData.fn.storage.saveAs(appData);appData.modal=false;">Save To Storage</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-close" x-ng-click="appData.modal=false">Close</button>
    </div>
    </div>