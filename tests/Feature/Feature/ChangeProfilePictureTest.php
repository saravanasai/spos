<?php

namespace Tests\Feature\Feature;

use App\Http\Livewire\Profile\ChangeProfilePictureComponent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Tests\TestCase;

class ChangeProfilePictureTest extends TestCase
{

    /**
     * A  test for user can see change profile image page.
     * @test
     * @return void
     */
    public function can_see_profile_image_change_screen()
    {
        $user = User::find(1);

        $this->actingAs($user);

        $response = $this->get(route('setting.change-password'));

        $response->assertStatus(200);
    }

    /**
     * A  test for user can upload profile image.
     * @test
     * @return void
     */
    public function can_upload_profile_image()
    {
        $user = User::find(1);

        $this->actingAs($user);

        $file = UploadedFile::fake()->image('avatar.png');

        $response =  Livewire::test(ChangeProfilePictureComponent::class)
            ->set('photo', $file)
            ->call('save');

        $response->assertSet('imageUploaded', true);
    }
}
