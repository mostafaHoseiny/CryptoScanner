<div class="admin-panel-content">
    <h1>Here We Go Again On Logs!</h1>

    <div class="logs-content">
        <div class="logs-list">
            <ul>
                @foreach($files as $file)
                    <li class="log-file-name">{{ explode('.',$file)[0] }}</li>
                @endforeach
            </ul>
        </div>

        <div class="logs-info"></div>
    </div>

</div>