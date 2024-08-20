<div>
    <h1>statistics</h1>

    @if($statistics->error)
        <div>{{ $statistics->message }}</div>
    @endif
    <div>
        <h2>Number of Blocks</h2>
        <span>Latest: </span>
        <span>{{ $statistics->data->whole_block_count }}</span>
    </div>
    <div>
        <h2>Block Rewards</h2>
        <span>Total burned: </span>
        <span>{{ $statistics->data->whole_pay }}</span>
    </div>

    <ul>
        <li>last_day_pay: {{ $statistics->data->last_day_pay }}</li>
        <li>last_day_block_count: {{ $statistics->data->last_day_block_count }}</li>
        <li>last_day_total_burn: {{ $statistics->data->last_day_total_burn }}</li>
        <li>whole_block_count: {{ $statistics->data->whole_block_count }}</li>
        <li>whole_pay: {{ $statistics->data->whole_pay }}</li>
        <li>last_day_burn: {{ $statistics->data->last_day_burn }}</li>
    </ul>
</div>