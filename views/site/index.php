
<div class="ind_pg">
    <?php
    if (!app()->auth::check()):
        ?>
        <p>Данный сервис создан для учета абонентов компании ООО “Корпорейшн”. Является закрытым проектом.
            Доступ имеют только сотрудники данной компании, если вы являетесь таковым, войдите в систему.</p>
    <?php
    else:
        ?>
        <p>Данный сервис создан для учета абонентов компании ООО “Корпорейшн”. Является закрытым проектом.
            Доступ имеют только сотрудники данной компании, у вас есть возможность вести учет абонентов.</p>
    <?php
    endif;
    ?>
</div>

<style>
    .ind_pg > p {
        width: 900px;
        margin: 30px 0 0 130px;
    }
</style>
