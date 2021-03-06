<div x-init-upload>
    <div class="ipnrm-ui-modal-header">
        <div class="ipnrm-ui-close" x-ng-click="appData.modal=false">&times;</div>
        <h4 class="ipnrm-ui-modal-title">Select Images</h4>
    </div>
    
    <div class="ipnrm-ui-modal-body">
        <div class="ipnrm-ui-info">
            Upload an image or select one from the list below
        </div>
        
        <div class="ipnrm-ui-form-group" x-ng-class="{'ipnrm-ui-active': appData.upload.isActive}">
            <div class="ipnrm-ui-loading"></div>
            <input type="file" x-file-upload x-data="appData.upload.uploadFile">
            <button class="ipnrm-ui-btn ipnrm-ui-btn-upload" x-ng-click="appData.fn.upload.doUpload(appData)">Upload</button>
        </div>
        
        <div class="ipnrm-ui-form-group">
            <select size="10" x-ng-dblclick="appData.fn.upload.selectFile(appData)" x-ng-options="file as file.filename for file in appData.upload.files" x-ng-model="appData.upload.selectedFile">
                <option style="display:none" value=""></option>
            </select>
        </div>
    </div>
    
    <div class="ipnrm-ui-modal-footer">
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-delete" x-ng-click="appData.fn.upload.deleteFile(appData)">Delete</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-select" data-dismiss="modal" x-ng-click="appData.fn.upload.selectFile(appData);appData.modal=false;">Select</button>
        <button type="button" class="ipnrm-ui-btn ipnrm-ui-btn-close" x-ng-click="appData.modal=false">Close</button>
    </div>
</div>