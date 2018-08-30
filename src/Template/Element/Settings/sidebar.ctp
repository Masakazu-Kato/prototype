<?php
$_name = strtolower($this->name);
?>
<ul class="nav nav-sidebar">
    <li<?php if ($_name === 'users') echo ' class="active"' ?>>
        <a href="/settings/users/">アカウント</a>
    </li>
    <li<?php if ($_name === 'prefectures') echo ' class="active"' ?>>
        <a href="/settings/prefectures/">都道府県</a>
    </li>

    <li<?php if ($_name === 'mailtypes') echo ' class="active"' ?>>
        <a href="/settings/mail-types/">メールタイプ</a>
    </li>

    <li<?php if ($_name === 'applications') echo ' class="active"' ?>>
        <a href="/settings/applications/">API</a>
    </li>
    <li<?php if ($_name === 'roles') echo ' class="active"' ?>>
        <a href="/settings/roles/">役割</a>
    </li>
    <li<?php if ($_name === 'departments') echo ' class="active"' ?>>
        <a href="/settings/departments/">部門</a>
    </li>
    <li<?php if ($_name === 'mailtemplates') echo ' class="active"' ?>>
        <a href="/settings/mail-templates/">メールテンプレート</a>
    </li>
    <li<?php if ($_name === 'holidays') echo ' class="active"' ?>>
        <a href="/settings/holidays/">休日</a>
    </li>
    <li<?php if ($_name === 'surveymonkeyapicounts') echo ' class="active"' ?>>
        <a href="/settings/survey-monkey-api-counts/">SurveyMonkeyApi</a>
    </li>
    <li<?php if ($_name === 'sendgridapicounts') echo ' class="active"' ?>>
        <a href="/settings/sendgrid-api-counts/">SendGridApi</a>
    </li>
    <li<?php if ($_name === 'sendgridtemplates') echo ' class="active"' ?>>
        <a href="/settings/sendgrid-templates/">SendGridテンプレート</a>
    </li>
</ul>
