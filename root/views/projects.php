<!-- projects.php -->
<?php include_once 'partials/header.php'; ?>
<?php foreach ($projects as $project): ?>
    <div class="project">
        <a href="index.php?action=show&id=<?php echo $project['id']; ?>">
            <img src="<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
            <h2>
                <?php echo $project['title']; ?>
            </h2>
        </a>
    </div>
<?php endforeach; ?>
<?php include_once 'partials/footer.php'; ?>