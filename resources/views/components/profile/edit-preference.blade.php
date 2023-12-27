<div id="editPreferencesActive" class="tab-content" style="display: none">
    <div class="border rounded p-4">
        <p class="fs-5 mb-3"><strong>My Preferences</strong></p>
        <form action="/edit-preferences" method="POST">
            @csrf
            <div class="row row-cols-3 mx-0 w-75">
                @foreach ($serviceTypes as $serviceType)
                    <div class="form-check col mb-3">
                        <input class="form-check-input" type="checkbox" name="preference[]"
                            id="preference{{ $loop->iteration }}" value="{{ $serviceType->st_id }}"
                            {{ in_array($serviceType->st_id, $userServiceTypes) ? 'checked' : '' }}>
                        <label class="form-check-label" for="preference{{ $loop->iteration }}">
                            {{ $serviceType->st_name }}
                        </label>
                    </div>
                @endforeach
                @error('preference')
                    <div class="invalid-feedback d-block">
                        {{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="text-end">
                <button class="profile-save-btn" type="submit">Save</button>
            </div>
        </form>
    </div>
</div>
