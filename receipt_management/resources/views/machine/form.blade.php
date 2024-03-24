@csrf 
<dl class="form-list">
    <dt>機械の名前</dt>
    <dd><input type="text" name="name" value="{{ old('name') }}"></dd>
    <dt>レシートの残量</dt>
    <dd><input type="text" name="remaining_length" value="{{ old('remaining_length') }}">cm<br>
        ＊空白の場合デフォルトで6400cmが適用されます
    </dd>
</dl>
