<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->command->info('Limpando Tabela de Usuarios, Grupos, Perfis e Permissões');
        //$this->truncateLaratrustTables();

        $this->command->info('Criando Grupos');

        $grupos = [
            ['name' => 'Administração','parent_id' => null],//1
            ['name' => 'Usuários','parent_id' => 1],//2
            ['name' => 'Perfis','parent_id' => 1],//3
            ['name' => 'Permissões','parent_id' => 1],//4
            ['name' => 'Auditoria','parent_id' => 1],//5
            ['name' => 'Comissionados','parent_id' => null],//6
            ['name' => 'Cargos Comissionados','parent_id' => 6],//7
            ['name' => 'Grau de Instrução','parent_id' => 6],//8
            ['name' => 'Nomemclaturas','parent_id' => 6],//9
            ['name' => 'Regime de Trabalho','parent_id' => 6],//10
            ['name' => 'Secretarias','parent_id' => 6],//11
            ['name' => 'Tipos de Cargos','parent_id' => 6],//12
            ['name' => 'Linhas de Ônibus','parent_id' => 6],//13
            ['name' => 'Servidores','parent_id' => 6],//14
            ['name' => 'Validação de Servidores','parent_id' => 6],//15
            ['name' => 'Relatórios','parent_id' => null],//16
        ];

        foreach ($grupos as $grupo) {
            \App\Domains\Access\Models\PermissionGroup::create([
                'name' => $grupo['name'],
                'parent_id' => $grupo['parent_id']
            ]);
        }

        $permissoes = [
            ['name' => 'ver-administracao', 'display_name' => 'Ver Administração', 'group_id' => 1],
            ['name' => 'ver-usuario', 'display_name' => 'Ver Usuários', 'group_id' => 2],
            ['name' => 'criar-usuario', 'display_name' => 'Criar Usuários', 'group_id' => 2],
            ['name' => 'editar-usuario', 'display_name' => 'Editar Usuários', 'group_id' => 2],
            ['name' => 'desativar-usuario', 'display_name' => 'Desativar Usuários', 'group_id' => 2],
            ['name' => 'ver-perfil', 'display_name' => 'Ver Perfil', 'group_id' => 3],
            ['name' => 'criar-perfil', 'display_name' => 'Criar Perfil', 'group_id' => 3],
            ['name' => 'editar-perfil', 'display_name' => 'Editar Perfil', 'group_id' => 3],
            ['name' => 'ver-permissoes', 'display_name' => 'Ver Permissões', 'group_id' => 4],
            ['name' => 'criar-permissoes', 'display_name' => 'Criar Permissões', 'group_id' => 4],
            ['name' => 'editar-permissoes', 'display_name' => 'Editar Permissões', 'group_id' => 4],
            ['name' => 'ver-auditoria', 'display_name' => 'Ver Auditoria', 'group_id' => 5],
            ['name' =>'criar-cargos-comissionados','display_name'=>'Criar Cargos comissionados','group_id' => 7],
    		['name' =>'ver-cargos-comissionados','display_name'=>'Ver Cargos comissionados','group_id' => 7],
    		['name' =>'atualizar-cargos-comissionados','display_name'=>'Atualizar Cargos comissionados','group_id' => 7],
    		['name' =>'remover-cargos-comissionados','display_name'=>'Remover Cargos comissionados','group_id' => 7],
    		['name' =>'criar-grau-instrucao','display_name'=>'Criar Grau instrução','group_id' => 8],
    		['name' =>'ver-grau-instrucao','display_name'=>'Ver Grau instrução','group_id' => 8],
    		['name' =>'atualizar-grau-instrucao','display_name'=>'Atualizar Grau instrução','group_id' => 8],
    		['name' =>'remover-grau-instrucao','display_name'=>'Remover Grau instrução','group_id' => 8],
    		['name' =>'criar-nomenclaturas','display_name'=>'Criar Nomenclaturas','group_id' => 9],
    		['name' =>'ver-nomenclaturas','display_name'=>'Ver Nomenclaturas','group_id' => 9],
    		['name' =>'atualizar-nomenclaturas','display_name'=>'Atualizar Nomenclaturas','group_id' => 9],
    		['name' =>'remover-nomenclaturas','display_name'=>'Remover Nomenclaturas','group_id' => 9],
    		['name' =>'criar-regime-trabalho','display_name'=>'Criar Regime trabalho','group_id' => 10],
    		['name' =>'ver-regime-trabalho','display_name'=>'Ver Regime trabalho','group_id' => 10],
    		['name' =>'atualizar-regime-trabalho','display_name'=>'Atualizar Regime trabalho','group_id' => 10],
    		['name' =>'remover-regime-trabalho','display_name'=>'Remover Regime trabalho','group_id' => 10],
    		['name' =>'criar-secretarias','display_name'=>'Criar Secretarias','group_id' => 11],
    		['name' =>'atualizar-secretarias','display_name'=>'Atualizar Secretarias','group_id' => 11],
    		['name' =>'ver-secretarias','display_name'=>'Ver Secretarias','group_id' => 11],
    		['name' =>'remover-secretarias','display_name'=>'Remover Secretarias','group_id' => 11],
    		['name' =>'criar-tipo-cargos','display_name'=>'Criar Tipo cargos','group_id' => 12],
    		['name' =>'ver-tipo-cargos','display_name'=>'Ver Tipo cargos','group_id' => 12],
    		['name' =>'atualizar-tipo-cargos','display_name'=>'Atualizar Tipo cargos','group_id' => 12],
    		['name' =>'remover-tipo-cargos','display_name'=>'Remover Tipo cargos','group_id' => 12],
    		['name' =>'criar-linha-onibus','display_name'=>'Criar Linha onibus','group_id' => 13],
    		['name' =>'ver-linha-onibus','display_name'=>'Ver Linha onibus','group_id' => 13],
    		['name' =>'atualizar-linha-onibus','display_name'=>'Atualizar Linha onibus','group_id' => 13],
    		['name' =>'remover-linha-onibus','display_name'=>'Remover Linha onibus','group_id' => 13],
    		['name' =>'criar-servidores','display_name'=>'Criar Servidores','group_id' => 14],
    		['name' =>'ver-servidores','display_name'=>'Ver Servidores','group_id' => 14],
    		['name' =>'atualizar-servidores','display_name'=>'Atualizar Servidores','group_id' => 14],
    		['name' =>'remover-servidores','display_name'=>'Remover Servidores','group_id' => 14],
    		['name' =>'criar-validacao','display_name'=>'Criar Validacao','group_id' => 15],
    		['name' =>'ver-validacao','display_name'=>'Ver Validacao','group_id' => 15],
    		['name' =>'atualizar-validacao','display_name'=>'Atualizar Validaçao','group_id' => 15],
    		['name' =>'designar-validacao','display_name'=>'Designar Validação','group_id' => 15],
            ['name' =>'ver-relatorios','display_name'=>'Ver Relatorios','group_id' => 16],
        ];

        $permissions = [];

        $this->command->info('Criando Permissões');
        foreach ($permissoes as $permissao) {
            $permissions[] = \App\Domains\Access\Models\Permission::firstOrCreate([
                'name' => $permissao['name'],
                'display_name' => $permissao['display_name'],
                'group_id' => $permissao['group_id']
            ])->id;
        }

        $this->command->info('Criando Perfil Super Administrador');
        $roleSuper = \App\Domains\Access\Models\Role::create([
            'name' => 'administradores',
            'display_name' => 'ADMINISTRADORES',
            'description' => 'Administradores do Sistema'
        ]);

        $this->command->info('Criando Perfil Gerente');
        $roleGerente = \App\Domains\Access\Models\Role::create([
            'name' => 'secretarios',
            'display_name' => 'SECRETÁRIOS',
            'description' => 'Perfil para Secretários'
        ]);

        $this->command->info('Usuário');
        $roleUser = \App\Domains\Access\Models\Role::create([
            'name' => 'usuarios',
            'display_name' => 'USUÁRIOS',
            'description' => 'Usuário padrão do Sistema'
        ]);

        $this->command->info('Atribuindo Permissões');
        $roleSuper->permissions()->sync($permissions);
        $roleGerente->permissions()->sync($permissions);
        $roleUser->permissions()->sync($permissions);

        $this->command->info('Criando Usuários');
        $user = \App\Domains\Access\Models\User::create([
            'nome' => 'Angelo Neto',
            'username' => '1111',
            'email' => 'netopvh@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'active' => 1
        ]);

        $this->command->info('Atribuindo Perfil ao Usuário');
        $user->attachRole($roleSuper);
    }

    /**
     * Truncates all the laratrust tables and the users table
     *
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permission_role')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('role_user')->truncate();
        \App\Domains\Access\Models\User::truncate();
        \App\Domains\Access\Models\Role::truncate();
        \App\Domains\Access\Models\Permission::truncate();
        \App\Domains\Access\Models\PermissionGroup::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
