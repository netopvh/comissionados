@auth
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <li class="navigation-header">
                        <span>Módulo Comissionados</span>
                        <i class="icon-menu" title="Gerenciamento"></i>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-stack"></i>
                            <span>Cadastros</span>
                        </a>
                        <ul>
                            @permission('ver-cargos-comissionados')
                            <li class="{{ active(['comissionados.cargos.index','comissionados.cargos.*']) }}">
                                <a href="{{ route('comissionados.cargos.index') }}">
                                    <i class="icon-address-book"></i>
                                    <span class="text-bold">Cargos Comissionados</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-grau-instrucao')
                            <li class="{{ active(['comissionados.instrucao.index','comissionados.instrucao.*']) }}">
                                <a href="{{ route('comissionados.instrucao.index') }}">
                                    <i class="icon-book"></i>
                                    <span class="text-bold">Grau de Instrução</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-nomenclatura')
                            <li class="{{ active(['comissionados.nomenclatura.index','comissionados.nomenclatura.*']) }}">
                                <a href="{{ route('comissionados.nomenclatura.index') }}">
                                    <i class="icon-menu6"></i>
                                    <span class="text-bold">Nomenclatura do Cargo</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-regime-trabalho')
                            <li class="{{ active(['dashboard.regime.index','dashboard.regime.*']) }}">
                                <a href="{{ route('comissionados.regime.index') }}">
                                    <i class="icon-grid-alt"></i>
                                    <span class="text-bold">Regime de Trabalho</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-secretarias')
                            <li class="{{ active(['comissionados.secretarias.index','comissionados.secretarias.*']) }}">
                                <a href="{{ route('comissionados.secretarias.index') }}">
                                    <i class="icon-city"></i>
                                    <span class="text-bold">Secretarias</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-tipo-cargos')
                            <li class="{{ active(['comissionados.tipos.index','comissionados.tipos.*']) }}">
                                <a href="{{ route('comissionados.tipos.index') }}">
                                    <i class="icon-stairs"></i>
                                    <span class="text-bold">Tipos de Cargo</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-linha-onibus')
                            <li class="{{ active(['comissionados.linhas.index','comissionados.linhas.*']) }}">
                                <a href="{{ route('comissionados.linhas.index') }}">
                                    <i class="icon-bus"></i>
                                    <span class="text-bold">Linha de Onibus</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-servidores')
                            <li class="{{ active(['comissionados.servidores.index','comissionados.servidores.*']) }}">
                                <a href="{{ route('comissionados.servidores.index') }}">
                                    <i class="icon-user-tie"></i>
                                    <span class="text-bold">Servidores</span>
                                </a>
                            </li>
                            @endpermission

                        </ul>
                    </li>
                    @permission('ver-validacao')
                    <li>
                        <a href="#"><i class="icon-folder-check"></i> <span>Validações</span></a>
                        <ul>
                            <li class="{{ active(['comissionados.validacao.index','comissionados.validacao.*']) }}">
                                <a href="{{ route('comissionados.validacao.index') }}">
                                    <i class="icon-user-check"></i>
                                    <span class="text-bold">Validar Servidor</span>
                                </a>
                            </li>
                            @permission('designar-validacao')
                            <li class="{{ active(['comissionados.validacao.designar']) }}">
                                <a href="{{ route('comissionados.validacao.designar') }}">
                                    <i class="icon-collaboration"></i>
                                    <span class="text-bold">Designar Validador</span>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    @endpermission
                    @permission('ver-relatorios')
                    <li>
                        <a href="#"><i class="icon-stats-bars"></i> <span>Relatórios</span></a>
                        <ul>
                            <li class="{{ active(['dashboard/relatorios/servidores']) }}">
                                <a href="/dashboard/relatorios/servidores">
                                    <i class="icon-reading"></i>
                                    <span class="text-bold">Servidores</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endpermission
                    @permission('ver-administracao')
                    <li class="navigation-header">
                        <span>Menu Administrativo</span>
                        <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon-file-locked"></i>
                            <span class="text-bold">Gerenciamento de Acesso</span>
                        </a>
                        <ul>
                            @permission('ver-usuario')
                            <li class="{{ active(['users.*']) }}">
                                <a href="{{ route('users.index') }}">
                                    <i class="icon-user"></i>
                                    <span class="text-bold">Usuários</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-perfil')
                            <li class="{{ active(['roles.*']) }}">
                                <a href="{{ route('roles.index') }}">
                                    <i class="icon-users4"></i>
                                    <span class="text-bold">Perfil de Acesso</span>
                                </a>
                            </li>
                            @endpermission
                            @permission('ver-permissoes')
                            <li class="{{ active(['permissions.*']) }}">
                                <a href="{{ route('permissions.index') }}">
                                    <i class="icon-shield-notice"></i>
                                    <span class="text-bold">Permissões</span>
                                </a>
                            </li>
                            @endpermission
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="icon-cog"></i>
                            <span class="text-bold">Parâmetros do Sistema</span>
                        </a>
                    </li>
                    @permission('ver-auditoria')
                    <li class="{{ active(['audit.*']) }}">
                        <a href="{{ route('audit.index') }}">
                            <i class="icon-stack-star"></i>
                            <span class="text-bold">Auditoria</span>
                        </a>
                    </li>
                    @endpermission
                    @endpermission
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth