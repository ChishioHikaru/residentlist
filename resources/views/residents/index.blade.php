@extends('layouts.app')
@section('content')
    <h1>入居者一覧</h1>
    <br>
    @if (count($residents) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width = "200px">支払い状況</th>
                    <th width = "100px">編集</th>
                    <th>テナントNo.</th>
                    <th>名前</th>
                    <th>電話番号</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($residents as $resident)
                <tr>
                    <td>
                        @include('delinquents.delinquent_button')               
                    </td>
                    <td>{!! link_to_route('residents.show', $resident->id, ['resident' => $resident->id]) !!}</td>
                    <td width = "400px"><input id="copyTarget_{{$resident->id}}" type="text" value={{ $resident->tenant_number }} readonly>
                        <button onclick="copyToClipboard_{{$resident->id}}()"><i class="fas fa-clipboard"></i></button>
                            <script>
                                function copyToClipboard_{{$resident->id}}() {
                                // コピー対象をJavaScript上で変数として定義する
                                var copyTarget = document.getElementById("copyTarget_{{$resident->id}}");
                                // コピー対象のテキストを選択する
                                copyTarget.select();
                                // 選択しているテキストをクリップボードにコピーする
                                document.execCommand("Copy");
                                // コピーをお知らせする
                                alert("コピーできました！ : " + copyTarget.value);
                                }
                            </script></td>
                    <td width = "300px">{{ $resident->resident_name }}</td>
                    <td width = "400px"><input id="copy_tel_{{$resident->id}}" type="text" value={{ $resident->tel }}  readonly>
                        <button onclick="copy_tel_ToClipboard_{{$resident->id}}()"><i class="fas fa-clipboard"></i></button>
                            <script>
                                function copy_tel_ToClipboard_{{$resident->id}}() {
                                var copyTarget = document.getElementById("copy_tel_{{$resident->id}}");
                                copyTarget.select();
                                document.execCommand("Copy");
                                alert("コピーできました！ : " + copyTarget.value);
                                }
                            </script></td>
                    <td width = "800px">{{ $resident->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    {!! link_to_route('residents.create', '入居者の登録', [], ['class' => 'btn btn-primary']) !!}
    <br></br>
    {{ $residents->links() }}
@endsection

