<div>
    <h1>Last Blocks</h1>

    @if($last_blocks->error)
        <div>{{ $last_blocks->message }}</div>
    @endif

    <div>
        <table>
            <thead>
                <tr>
                    <th>Block</th>
                    <th>Age</th>
                    <th>Producer</th>
                    <th>Txn Count</th>
                    <th>Burned TRX</th>
                    <th>status</th>
                    <th>Consumed Energy / Bandwidth</th>
                    <th>Block Rewards</th>
                </tr>
            </thead>
            <tbody>
                @foreach($last_blocks->data as $block)
                <tr>
                    <td>{{ $block->number }}</td>
                    <td>{{ $block->timestamp }}</td>
                    <td>{{ $block->witnessAddress }}</td>
                    <td>{{ $block->nrOfTrx }}</td>
                    <td>{{ $block->fee }}</td>
                    <td>@if($block->confirmed) CONFIRMED @else UNCONFIRMED @endif</td>
                    <td>{{ $block->energyUsage }} / {{ $block->netUsage }}</td>
                    <td>176 TRX</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{--number   -> Block--}}
{{--hash   ->--}}
{{--size   ->--}}
{{--timestamp   -> Age--}}
{{--txTrieRoot   ->--}}
{{--parentHash   ->--}}
{{--witnessId   ->--}}
{{--witnessAddress   -> Producer--}}
{{--nrOfTrx   -> Txn Count--}}
{{--witnessName   ->--}}
{{--version   ->--}}
{{--fee   -> Burned TRX--}}
{{--confirmed   -> UNCONFIRMED -> status--}}
{{--confirmations   ->--}}
{{--energyUsage / netUsage   -> Consumed Energy / Bandwidth--}}
{{--blockReward   ->--}}
{{--voteReward   ->--}}
{{--revert   ->--}}

{{---> Block Rewards -> 176--}}