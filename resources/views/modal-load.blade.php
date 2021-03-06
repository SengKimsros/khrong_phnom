<div x-init-storage>
    <div class="ipnrm-ui-modal-header">
        <div class="ipnrm-ui-close" x-ng-click="appData.modal=false">&times;</div>
        <h4 class="ipnrm-ui-modal-title">Load Config</h4>
    </div>
    <div class="ipnrm-ui-modal-body">
        <div class="ipnrm-ui-info">
            Load a plugin config from the list below
        </div>
        
        <div class="ipnrm-ui-form-group">
            <select size="10" x-ng-dblclick="appData.fn.storage.load(appData)" x-ng-options="config as config.name for config in appData.storage.configs" x-ng-model="appData.storage.selectedConfig">
                <option style="display:none" value=""></option>
            </select>
        </div>
    </div>
    <div class="ipnrm-ui-modal-footer">
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-delete" x-ng-click="appData.fn.storage.remove(appData)">Delete</button>
        <input  id="ipnrm-load-from-file" type="file" style="display:none;" />
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-loadfromfile" x-ng-click="appData.fn.storage.loadFromFile(appData);appData.modal=false;">Load From File</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-load" x-ng-click="appData.fn.storage.load(appData);appData.modal=false;">Load From Storage</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-close" x-ng-click="appData.modal=false">Close</button>
    </div>
</div>