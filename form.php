<form action="form.php" method="POST">
    <label>
        ФИО:<br>
        <input type="text" name="fullname" value="<?php echo isset($_SESSION['form_values']['fullname']) ? $_SESSION['form_values']['fullname'] : ''; ?>">
    </label>
    <?php if (!empty($_SESSION['form_errors']['fullname'])) : ?>
        <span style="color: red;"><?php echo $_SESSION['form_errors']['fullname']; ?></span>
    <?php endif; ?>
    <br>

    <label>
        Номер телефона:<br>
        <input type="tel" name="phone" value="<?php echo isset($_SESSION['form_values']['phone']) ? $_SESSION['form_values']['phone'] : ''; ?>">
    </label><br>

    <label>
        Email:<br>
        <input type="email" name="email" value="<?php echo isset($_SESSION['form_values']['email']) ? $_SESSION['form_values']['email'] : ''; ?>">
    </label><br>

    <label>
        Дата рождения:<br>
        <input type="date" name="birth_date" value="<?php echo isset($_SESSION['form_values']['birth_date']) ? $_SESSION['form_values']['birth_date'] : ''; ?>">
    </label><br>

    <label>
        Ваш пол:<br>
        <input type="radio" name="gender" value="Мужской" <?php echo isset($_SESSION['form_values']['gender']) && $_SESSION['form_values']['gender'] === 'Мужской' ? 'checked' : ''; ?>> Мужской
        <input type="radio" name="gender" value="Женский" <?php echo isset($_SESSION['form_values']['gender']) && $_SESSION['form_values']['gender'] === 'Женский' ? 'checked' : ''; ?>> Женский
    </label><br>

    <label>
        Любимый язык программирования:<br>
        <select name="favorite_languages[]" multiple>
            <option value="Pascal" <?php echo isset($_SESSION['form_values']['favorite_languages']) && in_array('Pascal', $_SESSION['form_values']['favorite_languages']) ? 'selected' : ''; ?>>Pascal</option>
            <option value="C" <?php echo isset($_SESSION['form_values']['favorite_languages']) && in_array('C', $_SESSION['form_values']['favorite_languages']) ? 'selected' : ''; ?>>C</option>
        </select>
    </label><br>

    <label>
        Биография:<br>
        <textarea name="biography"><?php echo isset($_SESSION['form_values']['biography']) ? $_SESSION['form_values']['biography'] : ''; ?></textarea>
    </label><br>

    <label>
        <input type="checkbox" name="contract_accepted" <?php echo isset($_SESSION['form_values']['contract_accepted']) && $_SESSION['form_values']['contract_accepted'] ? 'checked' : ''; ?>> С контрактом ознакомлен
    </label><br>

    <input type="submit" value="Сохранить">
</form>