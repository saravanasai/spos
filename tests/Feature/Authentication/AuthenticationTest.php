<?php

namespace Tests\Feature\Authentication;

use App\Http\Livewire\Auth\LoginFormComponent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    /**
     * A test for user try to access route home.
     *
     * @return void
     * @test
     */
    public function user_try_access_home_url()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    /**
     * A test for user try to access dashboard without login.
     *
     * @return void
     * @test
     */
    public function user_try_access_dashboard_without_login()
    {
        $response = $this->get(route('dashboard'));

        $response->assertStatus(302);
    }

    /**
     * A test for user can see a login page.
     *
     * @return void
     * @test
     */
    public function user_can_see_login_page()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }

    /**
     * A test for user login screen validation email required.
     *
     * @return void
     * @test
     */
    public function email_is_required()
    {
        Livewire::test(LoginFormComponent::class)

            ->set('email', '')
            ->call('login')

            ->assertHasErrors(['email' => 'required']);

        Livewire::test(LoginFormComponent::class)

            ->set('email', 'admin')
            ->call('login')

            ->assertHasErrors(['email' => 'email']);
    }
    /**
     * A test for user login screen validation email is valid.
     *
     * @return void
     * @test
     */
    public function email_is_valid()
    {
        Livewire::test(LoginFormComponent::class)

            ->set('email', 'admin')
            ->call('login')
            ->assertHasErrors(['email' => 'email']);
    }

    /**
     * A test for user login screen validation password is required.
     *
     * @return void
     * @test
     */
    public function password_is_required()
    {
        Livewire::test(LoginFormComponent::class)
            ->set('password', '')
            ->call('login')
            ->assertHasErrors(['password' => 'required']);
    }

    /**
     * A test for user login screen validation password is digits.
     *
     * @return void
     * @test
     */
    public function password_is_digits()
    {
        Livewire::test(LoginFormComponent::class)
            ->set('password', 'ass')
            ->call('login')
            ->assertHasErrors(['password' => 'digits']);
    }

    /**
     * A test for user can login.
     *
     * @return void
     * @test
     */
    public function user_can_login()
    {
        Livewire::test(LoginFormComponent::class)
            ->set('email', 'admin@gmail.com')
            ->set('password', '12345')

            ->call('login')

            ->assertRedirect(route('dashboard'));
    }

    /**
     * A test for user can login.
     *
     * @return void
     * @test
     */
    public function user_can_logout()
    {
        $user = User::find(1);

        $this->be($user);

        $this->post(route('logout'))->assertRedirect(route('login'));
    }
}
