<div class="form-group {{ $errors->has('group_id') ? 'has-error' : ''}}">
    <label for="group_id" class="control-label">{{ 'Group Id' }}</label>

    
    <select class="form-control" id="group-option" name="group_id">
        @foreach ($groups as $group)
            <option value="{{ $group->id }}" "{{ isset($schedule->group_id) ? ($schedule->group_id == $group->id ? 'selected' : '') : ''}}">
                {{ $group->name }}
            </option>
        @endforeach
    </select>
    {!! $errors->first('group_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <input class="form-control" name="note" type="text" id="note" value="{{ isset($schedule->note) ? $schedule->note : ''}}" >
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_at') ? 'has-error' : ''}}">
    <label for="start_at" class="control-label">{{ 'Start At' }}</label>
    <input class="form-control" name="start_at" type="datetime-local" id="start_at" value="{{ isset($schedule->start_at) ? $schedule->start_at : ''}}" >
    {!! $errors->first('start_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('end_at') ? 'has-error' : ''}}">
    <label for="end_at" class="control-label">{{ 'End At' }}</label>
    <input class="form-control" name="end_at" type="datetime-local" id="end_at" value="{{ isset($schedule->end_at) ? $schedule->end_at : ''}}" >
    {!! $errors->first('end_at', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
